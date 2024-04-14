<?php

namespace Database\Seeders;

use App\Models\World;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        World::create([
            'game_id' => 2,
            'thumbnail' => 'https://pbs.twimg.com/media/FvslCMAaYAEwAVq?format=jpg&name=large',
            'name' => 'Herta Space Station',
            'description' => 'smth',
            'content' => null,
        ]);
        World::create([
            'game_id' => 2,
            'thumbnail' => 'https://webstatic.hoyoverse.com/upload/op-public/2022/09/26/807e520039a15abb43876a7067e74ff9_2250126543597986363.png',
            'name' => 'Jarlio IV',
            'description' => 'smth',
            'content' => null,
        ]);
        World::create([
            'game_id' => 2,
            'thumbnail' => 'https://static.wikia.nocookie.net/houkai-star-rail/images/a/a3/World_The_Xianzhou_Luofu.png',
            'name' => 'Xianzhou Luofu',
            'description' => 'smth',
            'content' => null,
        ]);
        World::create([
            'game_id' => 2,
            'thumbnail' => 'https://static.wikia.nocookie.net/houkai-star-rail/images/e/e0/World_Penacony.png',
            'name' => 'Penacony',
            'description' => 'smth',
            'content' => null,
        ]);
    }
}
