<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create([
            'logo' => 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg',
            'name' => 'Honkai Impact 3rd',
            'description' => 'smth',
            'content' => null,
            'release_date' => now()
        ]);
        Game::create([
            'logo' => 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg',
            'name' => 'Honkai Star Rail',
            'description' => 'smth',
            'content' => null,
            'release_date' => now()
        ]);
        Game::create([
            'logo' => 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg',
            'name' => 'Genshin Impact',
            'description' => 'smth',
            'content' => null,
            'release_date' => now()
        ]);
    }
}
