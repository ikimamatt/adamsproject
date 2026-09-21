<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('logos')->insert([
            'profile_image' => 'logos/7V9Cne4wM0zJkakv15iH1UjkZI0ZRUXHOIlV4Ifm.png',
         ]);
    }

}
