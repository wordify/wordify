<?php

class FollowsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    public function checkIfFollowing($userid, $followid) {
        $follow = Follow::where('useridfollower', '=', $userid)->where('useridfollowed', '=', $followid)->first();
        
        /*if(is_null($follow)) return false;

        return true;
    */
        return $follow;

    }

}