<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'blog',
            'contact_email' => 'blog@blog.com',
            'address' => 'blog',
            'image' => 'im.jpg',
            'phone_number' => '0213216548'
        ]);
    }
}
