<?php

namespace Database\Seeders;

use App\Models\Aeon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AeonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Aeon::create([
            'path_id' => 1,
            'thumbnail' => 'https://img.freepik.com/free-vector/illustration-gallery-icon_53876-27002.jpg',
            'name' => 'Destruction',
            'title' => 'smth',
            'description' => 'smth',
            'content' => null,
            'first_appearance' => now()
        ]);
    }
}
