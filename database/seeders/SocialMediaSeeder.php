<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'instagram' => 'https://www.instagram.com/adamdustin/',
            'facebook' => 'https://www.facebook.com/adam.d.bhakti/?locale=id_ID',
            'tiktok' => 'https://www.tiktok.com/@adamdustinbhakti',
            'twitter' => 'https://www.twitter.com/example',
        ]);
    }
}
