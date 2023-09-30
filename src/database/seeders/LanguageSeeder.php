<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Language::create(
            ['language' => 'HTML']
        );
        \App\Models\Language::create(
            ['language' => 'CSS']
        );
        \App\Models\Language::create(
            ['language' => 'JavaScript']
        );
        \App\Models\Language::create(
            ['language' => 'PHP']
        );
        \App\Models\Language::create(
            ['language' => 'Laravel']
        );
        \App\Models\Language::create(
            ['language' => 'SQL']
        );
        \App\Models\Language::create(
            ['language' => 'SHELL']
        );
        \App\Models\Language::create(
            ['language' => '情報システム基礎知識']
        );
    }
}
