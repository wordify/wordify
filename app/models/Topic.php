<?php

class Topic extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    /**
    * Each topic has many words
    *
    **/
    public function words() {
    	return $this->hasMany('Word');
    }

}