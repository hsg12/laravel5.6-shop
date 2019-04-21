<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Anna Smith',
            'email' => 'anna@test.com',
            'address' => 'Some address here',
            'password' => Hash::make('annaanna'),
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
