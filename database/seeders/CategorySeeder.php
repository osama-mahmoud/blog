<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Web',
            'slug' => 'Web',
        ]);
        Category::create([
            'name' => 'Mobile',
            'slug' => 'Mobile',
        ]);
        Category::create([
            'name' => 'Desktop',
            'slug' => 'Desktop',
        ]);
        Category::create([
            'name' => 'Games',
            'slug' => 'Games',
        ]);
    }
}
