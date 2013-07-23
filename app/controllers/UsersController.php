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
            'username' => 'required|min:3|max:80',
            'password' => 'required|min:6',
            'email' => 'required|email'
        );

        $validation = Validator::make($new_user, $rules);

        if($validation->fails()) {
            return Redirect::to('users/create')
                    ->withErrors($validation)->withInput();
        }

        $user = User::create($new_user);

        return $user;
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

}