<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Content::create(
        //     ['content' => 'インプット']
        // );
        \App\Models\Content::create(
            ['content' => 'ドリル']
        );
        \App\Models\Content::create(
            ['content' => '課題']
        );
        \App\Models\Content::create(
            ['content' => '自主学習']
        );
    }
}
