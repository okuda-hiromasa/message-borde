<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create('ja_JP');

        DB::table('posts')->insert([
            'user_id' => '1',
            'category_id' => '1',
            'content' => $faker->text,
            'title' => $faker->title,
        ]);
        DB::table('posts')->insert([
            'user_id' => '1',
            'category_id' => '1',
            'content' => $faker->text,
            'title' => $faker->title,
        ]);
        DB::table('posts')->insert([
            'user_id' => '1',
            'category_id' => '1',
            'content' => $faker->text,
            'title' => $faker->title,
        ]);
    }
}
