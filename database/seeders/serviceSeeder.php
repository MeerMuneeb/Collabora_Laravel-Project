<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            'name' => 'I can Teach you Java',
            'price' => '8000',
            'category' => 'Education',
            "description" => "I can Teach you Java Fast",
            "picture" => "https://e0.pxfuel.com/wallpapers/384/812/desktop-wallpaper-java-java-code-thumbnail.jpg",
        ]);

    }
}
