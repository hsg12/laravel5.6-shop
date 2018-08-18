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
        	'name' => 'John Smith',
        	'email' => 'smith@test.com',
        	'password' => '$2y$10$OJsadONpbRzd5FNPiqDbJulHMvCwRZdFQakCVYTiVUnBYv1R8ATO.',
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s')
        ]);
    }
}
