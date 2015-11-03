<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array(
			'name'=>'nandha',
			'email'=>'nandha@gmail.com',
			'password'=>\Hash::make('secret')
		));
    }
}
