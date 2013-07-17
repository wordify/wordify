<?php

class WordsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('words')->delete();

        $words = array(
        	array(
        		'word' => 'TestWord1',
        		'topic_id' => '1',
        		'user_id' => '1'
        	),
        	array(
        		'word' => 'TestWord2',
        		'topic_id' => '2',
        		'user_id' => '1'
        	),
        	array(
        		'word' => 'TestWord3',
        		'topic_id' => '1',
        		'user_id' => '1'
        	),
        	array(
        		'word' => 'TestWord4',
        		'topic_id' => '2',
        		'user_id' => '1'
        	),
        	array(
        		'word' => 'TestWord5',
        		'topic_id' => '1',
        		'user_id' => '1'
        	),
        	array(
        		'word' => 'TestWord6',
        		'topic_id' => '2',
        		'user_id' => '1'
        	),
        	array(
        		'word' => 'TestWord7',
        		'topic_id' => '1',
        		'user_id' => '1'
        	)
        );

        // Uncomment the below to run the seeder
         DB::table('words')->insert($words);
    }

}