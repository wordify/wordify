<?php
use OAuth2\OAuth2;
use OAuth2\Token_Access;
use OAuth2\Exception as OAuth2_Exception;


class OauthController extends BaseController {

    /**
     * Logs the user in using the givin provider
     * @provider facebook
     * @return Redirect to frontpage
     */
    public function index($provider)
    {

        // Select the correct provider
        switch($provider) {
            case 'facebook':
                $provider = OAuth2::provider($provider, array(
                    'id' => '544700252263786',
                    'secret' => 'e3df37bb095d573b1cf26d7200a28eb0'
                ));
                break;
        }

        // Checks if the user needs to authorize the app
        if(!Input::get('code')) return $provider->authorize();
    
        try {
            // Getting the access token and connects to the provider
            $params = $provider->access(Input::get('code'));
            $token = new Token_Access(array(
                'access_token' => $params->access_token
            ));
            
            // Get the user details
            $user = $provider->get_user_info($token);


            $usercheck = User::where('email', '=', $user['email'])
                ->orWhere('username', '=', $user['nickname'])->first();

            // Check if the user is registered in the DB
            if(is_null($usercheck)) {

                $profilePicture = 'https://graph.facebook.com/'.$user['uid'].'/picture?width=400&height=400';
                $userDetails  = array(
                    'username' => $user['nickname'],
                    'password' => Hash::make(rand(1, 10000000)),
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'profilePicture' => $profilePicture
                );

                // Create user
                User::create($userDetails);
            } else {
                $user = User::where('username', '=', $user['email'])->orWhere('username', '=', $user['nickname'])->first();

                // Log user in
                Auth::login($user);
                return Redirect::to('/');
            }
        } catch(OAuth2_Exception $e) {
            echo 'Error: $e';
        }
    }

}