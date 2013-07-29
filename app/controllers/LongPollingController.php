<?php

class LongPollingController extends BaseController {

    public function longPolling()
    {
        $time = time();

        $wordid = Input::get('wordid');
        $commentid = input::get('commentid');

        session_write_close();

        set_time_limit(0);

        while((time() - $time) < 25) {

        	// Get the items
            $words = Word::take(100)->where('id', '>', $wordid)->orderBy('id', 'desc')->get();
            $comments = Comment::take(100)->where('id', '>', $commentid)->orderBy('id', 'asc')->get();

            // Check if any items
            if (!$words->isEmpty() || !$comments->isEmpty()) {

            	$theView = $this->getWords($words);
            	$theView .= $this->getComments($comments);

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

            $theView .= '<script> $(".lastWordId").removeClass($(".lastWordId").attr("class").split(" ")[1]).addClass("'.$words[0]->id.'"); </script>';

            return $theView;

        }

        return '';

    }

    private function getComments($comments) 
    {

        if (is_object($comments[0])) {

            $theView = View::make('comments.index', array('comments' => $comments))->render();

            $theView .= '<script> $(".lastCommentId").removeClass($(".lastCommentId").attr("class").split(" ")[1]).addClass("'.$comments[0]->id.'"); </script>';

            return $theView;

        }

        return '';

    }

    

    
}