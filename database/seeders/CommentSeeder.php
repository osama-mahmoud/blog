<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'body' => 'Desktop',
            'user_id' => 1,
            'post_id' => 1,
        ]);
        Comment::create([
            'body' => 'Desktop',
            'user_id' => 1,
            'post_id' => 2,
        ]);
        Comment::create([
            'body' => 'Desktop',
            'user_id' => 1,
            'post_id' => 3,
        ]);
        Comment::create([
            'body' => 'Desktop',
            'user_id' => 1,
            'post_id' => 4,
        ]);
    }
}
