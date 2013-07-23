<?php

class WordsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $words = Word::take(100)->orderBy('created_at', 'desc')->get();

        return $words;
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
        /**$new_word = array(

        );*/

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