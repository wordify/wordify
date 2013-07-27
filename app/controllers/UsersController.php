<?php

class UsersController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        /*$words = $this->getUsersWords(1);
        $data = array('users' => $users, 'words' => $words);*/

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($default_user = '')
    {
        return View::make('users.create')->with('user', $default_user);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $new_user = array(
            'username' => Input::get('username'),
            'password' => Hash::make(Input::get('password')),
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'country' => Input::get('country'),
            'job' => Input::get('job'),
            'website' => Input::get('website')
        );

        $rules = array(
            'username' => 'required|min:3|max:80|alpha|unique:users',
            'password' => 'required|min:6',
            'email' => 'required|email|unique:users'
        );

        $validation = Validator::make($new_user, $rules);

        if($validation->fails()) {
            return Redirect::to('/')->withErrors($validation);

        }

        $user = User::create($new_user);

        $credentials = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')    
        );

        Auth::attempt($credentials);

        return Redirect::to('/');
    }

    /**
    * Logs the user in
    * @return Redirect frontpage
    **/
    public function login() {
        $credentials = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );

        Auth::attempt($credentials);

        return Redirect::to('/');
    }

    /**
    * Logs user out
    * @return Redirect frontpage
    **/
    public function logout() {
        Auth::logout();

        return Redirect::to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id)->first();
    
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id)-delete();

        return $user;
    }

    /**
    * Get the profile view of the userid 
    *
    * @return profile view
    **/
    public function getProfile() {
        $user = User::find(Input::get('userId'));
        $followers = $this->getFollowersCount(Input::get('userId'));
        $following = $this->getFollowingCount(Input::get('userId'));
        $words = $this->getLastTenWords(Input::get('userId'));

        //Checks if the user follows the clicked user
        $follow = new FollowsController();
        $followstatus = $follow->checkIfFollowing(Auth::user()->id, Input::get('userId'));
        
        // Making the print order shuffled
        $wordarray = array();
        foreach ($words as $w) {
            $wordarray[] = $w;
        }
        shuffle($wordarray);

        $commentCount = $this->getLastTenWordsTotalCommentCount(Input::get('userId'));
        if(is_null($user)) {
            $theView = View::make('users.profile', ['user' => false])->render();
        } else {
            $theView = View::make('users.profile', 
                ['user' => $user, 'followers' => $followers, 'following' => $following, 'words' => $wordarray, 'totalCount' => $commentCount, 'followstatus' => $followstatus])
                ->render();
        }
        
        return $theView;
    }

    public function getFollowersCount($userId) {
        $followers = Follow::where('useridfollowed', '=', $userId)->count();

        return $followers;
    }

    public function getFollowingCount($userId) {
        $following = Follow::where('useridfollower', '=', $userId)->count();

        return $following;
    }

    /**
    * Get users words
    * @param userid
    * @return words
    **/
    public function getUsersWords($id) {
        $words = User::find($id)->words()->get();

        return $words;
    }

    /**
    * Count how many words the user have
    * @param userid
    * @return count
    **/
    public function countUserWords($id) {
        $wordCount = User::find($id)->words()->count();

        return $wordCount;
    }

    /**
    * Get the users last ten words
    * @param userid
    * @return words
    **/
    public function getLastTenWords($id) {
        $words = User::find($id)->words()->orderBy('id', 'desc')->take(10)->get();

        return $words;
    }

    public function getLastTenWordsTotalCommentCount($id) {
        $words = User::find($id)->words()->orderBy('id', 'desc')->take(10)->get();
        $totalcount = 0;
        foreach($words as $w) {
            $totalcount = $totalcount + $w->comments()->count();
        }

        return $totalcount;
    }

}