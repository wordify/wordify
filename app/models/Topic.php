<?php

class Topic extends Eloquent {
    protected $fillable = array('topic');

    public static $rules = array();

    /**
    * Each topic has many words
    *
    **/
    public function words() {
    	return $this->hasMany('Word');
    }

}