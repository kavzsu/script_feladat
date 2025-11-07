<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Script::factory()->createMany([
            ['title' => 'Hamlet', 'author' => 'Shakespeare'],
            ['title' => 'Romeo és Julia', 'author' => 'Shakespeare'],
            ['title' => 'Az Ember Tragédiája', 'author' => 'Madach Imre'],
            ['title' => 'Vizkereszt, vagy amit akartok', 'author' => 'Shakespeare'],
        ]);
    }
}
