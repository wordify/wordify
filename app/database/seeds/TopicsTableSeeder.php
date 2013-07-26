<?php

class TopicsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('topics')->delete();

        $topics = array(
        	array(
        		'topic'	=>	'TestTopic1',
        		'user_id'	=>	'1'
        	),
        	array(
        		'topic'	=>	'TestTopic2',
        		'user_id'	=>	'1'
        	)
        );

        // Uncomment the below to run the seeder
         DB::table('topics')->insert($topics);
    }

}