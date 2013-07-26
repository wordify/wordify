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
        			'password'	=>	Hash::make('7arm1dnp48'),
        			'country'	=>	'Denmark',
        			'job'	=>	'CEO Wordify',
        			'website'	=>	'http://wordify.me',
        			'userStatus'	=>	'1',
        			'created_at'	=>	'2013-02-18 21:20:02',
        			'updated_at'	=>	'2013-02-18 21:20:02',
        			'profilePicture'	=>	'https://graph.facebook.com/1320819338/picture?width=400&height=400',
                    'provider_id' => '1320819338'
        		)
        );

        // Uncomment the below to run the seeder
         DB::table('users')->insert($users);
    }

}