<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title' => 'Css',
            'slug' => Str::slug('Css'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'Vue JS',
            'slug' => Str::slug('Vue'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'Android studio',
            'slug' => Str::slug('Android'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 2,
            'category_id' => 2,
        ]);
        Post::create([
            'title' => 'C# Language',
            'slug' => Str::slug('C#'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 2,
            'category_id' => 3,
        ]);
    }
}
