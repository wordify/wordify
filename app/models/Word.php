<?php

class Word extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    /**
    * Words belongs to a user
    * @return user
    **/
    public function user() {
    	return $this->belongsTo('User');
    }

    /**
    * Words belongs to topic
    * @return topic
    **/
    public function topic() {
    	return $this->belongsTo('Topic');
    }
}