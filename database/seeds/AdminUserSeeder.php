<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Create an admin user
        DB::table('users')->insert([
        	'name' => 'Casper',
        	'password' => bcrypt('password')
        ]);
    }
}
