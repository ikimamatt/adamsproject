<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JumbotronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jumbotrons')->insert([
            'text_left' => '"Kerja Ikhlas, Kerja Cerdas,Kerja Tuntas, Kerja Jujur."',
            'text_right' => 'Temukan berbagai informasi menarik!',
            'background_image' => 'background.jpg',
            'profile_image' => 'profile.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
