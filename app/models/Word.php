<?php

class Word extends Eloquent {
    //protected $fillable = array('word', 'topic_id', 'user_id');

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