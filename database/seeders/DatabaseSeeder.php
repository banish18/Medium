<?php

namespace Database\Seeders;
use DB;
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
        \App\Models\User::truncate();
        \App\Models\Post::truncate();
        \App\Models\Tag::truncate();
        \App\Models\User::factory(1)->create();
        \App\Models\Tag::factory(1)->create();
        \App\Models\Post::factory(10)->create();
       
    }
}
