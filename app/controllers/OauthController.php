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

            // Checks if email is already taken
            $usercheck = User::where('provider_id', '=', null)->where('email', '=', $user['email'])->first();
            if($usercheck) return "Email is already taken";

            // Checks if the username is already taken
            $usercheck = User::where('provider_id', '=', null)->where('username', '=', $user['nickname'])->first();
            if($usercheck) return "Username is already taken";

            // Check if the user is registered in the DB
            $usercheck = User::where('provider_id', '=', $user['uid'])->first();
            if(is_null($usercheck)) {

                $profilePicture = 'https://graph.facebook.com/'.$user['uid'].'/picture?width=400&height=400';

                $userObj = new User();
                $userObj->username = $user['nickname'];
                $userObj->password = Hash::make(rand(1, 10000000));
                $userObj->name = $user['name'];
                $userObj->email = $user['email'];
                $userObj->profilePicture = $profilePicture;
                $userObj->provider_id = $user['uid'];

                // Save user
                $userObj->save();

                // Get newly created user
                $user = User::where('username', '=', $user['email'])->orWhere('username', '=', $user['nickname'])->first();

                Auth::login($user);
                return Redirect::to('/');
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