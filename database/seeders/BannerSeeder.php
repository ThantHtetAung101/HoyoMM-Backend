<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            'game_id' => 2,
            'title' => 'Banner',
            'image' => 'https://act-webstatic.hoyoverse.com/event-static-hoyowiki-admin/2024/03/22/ff1d375f10b51bbf3010c14817df9344_6993969380341089378.jpg?x-oss-process=image%2Fformat%2Cwebp'
        ]);
        Banner::create([
            'game_id' => 2,
            'title' => 'Banner',
            'image' => 'https://upload-static.hoyoverse.com/hoyowiki/2023/11/17/bb3cef82cbd11bcc556583b3223e221e_3210869724286253675.jpg?x-oss-process=image%2Fformat%2Cwebp'
        ]);
        Banner::create([
            'game_id' => 2,
            'title' => 'Banner',
            'image' => 'https://upload-static.hoyoverse.com/hoyowiki/2023/07/12/0d62b9571b931de658ab036a31792a7d_6921878215545116219.jpg?x-oss-process=image%2Fformat%2Cwebp'
        ]);
    }
}
