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

        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($user)
    {
        $user = User::create($user);

        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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