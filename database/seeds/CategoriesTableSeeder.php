<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'Sport',
        	'category_order' => 0,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('categories')->insert([
        	'name' => 'World',
        	'category_order' => 10,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('categories')->insert([
        	'name' => 'Travel',
        	'category_order' => 20,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('categories')->insert([
        	'name' => 'Entertainment',
        	'category_order' => 30,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('categories')->insert([
        	'parent_id' => 1,
        	'name' => 'Hockey',
        	'category_order' => 11,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('categories')->insert([
        	'parent_id' => 5,
        	'name' => 'Ice hockey',
        	'category_order' => 12,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);

        DB::table('categories')->insert([
        	'parent_id' => 5,
        	'name' => 'Field hockey',
        	'category_order' => 13,
        	'created_at' => date('Y-m-d H:m:s'),
        	'updated_at' => date('Y-m-d H:m:s'),
        ]);
    }
}
