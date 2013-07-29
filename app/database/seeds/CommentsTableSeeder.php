<?php

class CommentsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('comments')->delete();

        $comments = array(
        	array(
        		'comment' => 'TestComment1',
        		'word_id' => '1',
        		'user_id' => '1',
        		'point' => '1'
        	),
        	array(
        		'comment' => 'TestComment2',
        		'word_id' => '1',
        		'user_id' => '1',
        		'point' => '1'
        	),
        	array(
        		'comment' => 'TestComment3',
        		'word_id' => '2',
        		'user_id' => '1',
        		'point' => '1'
        	),
        	array(
        		'comment' => 'TestComment4',
        		'word_id' => '2',
        		'user_id' => '1',
        		'point' => '1'
        	),
        	array(
        		'comment' => 'TestComment5',
        		'word_id' => '2',
        		'user_id' => '1',
        		'point' => '1'
        	)
        );

        // Uncomment the below to run the seeder
         DB::table('comments')->insert($comments);
    }

}