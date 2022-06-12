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
            'title' => 'Html',
            'slug' => Str::slug('slug'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 1,
            'category_id' => 1,
        ]);
        Post::create([
            'title' => 'Java',
            'slug' => Str::slug('slug'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 1,
            'category_id' => 2,
        ]);
        Post::create([
            'title' => 'Python',
            'slug' => Str::slug('slug'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 1,
            'category_id' => 3,
        ]);
        Post::create([
            'title' => 'Unreal Engine',
            'slug' => Str::slug('slug'),
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution',
            'image' => 'im.jpg',
            'user_id' => 1,
            'category_id' => 4,
        ]);
    }
}
