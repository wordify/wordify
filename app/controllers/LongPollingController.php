<?php

class LongPollingController extends BaseController {

    public function longPolling()
    {
        $time = time();

        $wordid = Input::get('wordid');

        session_write_close();

        set_time_limit(0);

        while((time() - $time) < 25) {

        	// Get the items
            $words = Word::take(100)->where('id', '>', $wordid)->orderBy('id', 'desc')->get();

            // Check if items
            if (!$words->isEmpty()) {

            	$theView = $this->getWords($words);

            	if ($theView != '') {
            		return $theView;
            	} else sleep(2);
                
            } else sleep(2);

        }

    }

    private function getWords($words) 
    {

        if (is_object($words[0])) {

            $theView = View::make('words.index', array('words' => $words))->render();

            $theView .= '<script> $(".lastWordId").removeClass($(".lastWordId").attr("class").split(" ")[1]).addClass("'.$words[0]->id.'");</script>';

            return $theView;

        }

        return '';

    }

    
}