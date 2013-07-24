<?php

class Comment extends Eloquent {
    protected $guarded = array();

    public static $rules = array();

    /**
    * Comments belongs to a word
    * @return word
    **/
    public function word() {
    	$this->belongsTo('Word');
    }
}