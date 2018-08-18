<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        DB::table('categories')->truncate();
        DB::table('users')->truncate();

        $this->call(CategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
