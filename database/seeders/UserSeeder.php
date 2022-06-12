<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Osama',
            'email' => 'osama7420353@gamil.com',
            'password' => bcrypt('123456'),
            'user_img' => 'im.jpg',
        ]);
    }
}
