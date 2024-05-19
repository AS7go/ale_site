<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 25; $i++) {
            DB::table('posts')->insert([
                'category_id' => rand(1,10),
                'title' => 'Post '.$i,
                'description' => 'Description of post '.$i,
                'text' => '<p>lorem ipsom text lorem ipsom text lorem ipsom text <br>'.$i.'</p>',
                'slug' => 'post-'.$i,
            ]);
        }
    }
}
