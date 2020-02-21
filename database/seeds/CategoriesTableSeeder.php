<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(
            ['category_name' => 'book'],
        );
        DB::table('categories')->insert(
            ['category_name' => 'caff'],
            
        );
        DB::table('categories')->insert(
            ['category_name' => 'twitter'],   
        );
    }
}
