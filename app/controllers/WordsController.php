<?php

class WordsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /**ob_implicit_flush(true);
        $time = time();

        $wordid = Input::get('wordid');

        session_write_close();
        set_time_limit(0);

        while((time() - $time) < 15) {

            $words = Word::take(100)->where('id', '>', $wordid)->orderBy('created_at', 'desc')->get();

            if (!$words->isEmpty()) {

                $theView = View::make('words.index', ['words' => $words])->render();

                $theView .= '<script> $(".lastWordId").removeClass($(".lastWordId").attr("class").split(" ")[1]).addClass("'.$words[0]->id.'");</script>';

                echo $theView;

                break;
                //return $theView;

            } else {
                echo 'something<br/>';
                flush();
                sleep(1);
                clearstatcache();
            }

        }*/

    }

    public function longPolling()
    {
        $time = time();

        $wordid = Input::get('wordid');

        session_write_close();

        //set_time_limit(0);

        while((time() - $time) < 25) {

            $words = Word::take(100)->where('id', '>', $wordid)->orderBy('created_at', 'desc')->get();

            if (!$words->isEmpty()) {


                //die($words);


                if (is_object($words[0])) {

                    $theView = View::make('words.index', array('words' => $words))->render();

                    $theView .= '<script> $(".lastWordId").removeClass($(".lastWordId").attr("class").split(" ")[1]).addClass("'.$words[0]->id.'");</script>';

                }

                return $theView;
                

            } else {

                sleep(2);

            }

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($word)
    {
        $result = Word::create($word);

        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $word = new Word();

        $word->word = Input::get('word');
        $word->topic_id = Input::get('topicid');
        $word->user_id = Input::get('userid');

        $word->save();

        return Input::get('word').' '.Input::get('userid').' '.Input::get('topicid');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $word = Word::find($id)->first();

        return $word;
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
        $result = Word::find($id)->delete();
    }
}