<?php

namespace Database\Seeders;

use App\Models\Path;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Path::create([
            'logo' => 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg',
            'name' => 'Destruction',
            'description' => 'smth',
            'is_playable' => 1
        ]);
    }
}
