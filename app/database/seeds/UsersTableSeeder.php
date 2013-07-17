<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('users')->delete();

        $users = array(
        	array(
        			'username' => 'kyllesdk',
        			'name'	=>	'Jonas Hansen',
        			'email'	=>	'kyllesdk@gmail.com',
        			'password'	=>	'1234',
        			'country'	=>	'Denmark',
        			'job'	=>	'CEO Wordify',
        			'website'	=>	'http://wordify.me',
        			'userStatus'	=>	'1',
        			'created_at'	=>	'2013-02-18 21:20:02',
        			'updated_at'	=>	'2013-02-18 21:20:02',
        			'profilePicture'	=>	'PictureHere'
        		)
        );

        // Uncomment the below to run the seeder
         DB::table('users')->insert($users);
    }

}