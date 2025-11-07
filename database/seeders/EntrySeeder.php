<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Entry::factory()->createMany([
            ['script_id' => 1, 'order_no' => 1, 'name' => 'Nyitójelenet', 'action' => 'Szereplők bejönnek', 'media' => 'zene.mp3'],
            ['script_id' => 1, 'order_no' => 2, 'name' => 'Dialógus', 'action' => 'Hamlet beszél', 'light' => 'kék fény'],
            ['script_id' => 2, 'order_no' => 1, 'name' => 'Balcony Scene', 'action' => 'Rómeó és Júlia párbeszéd'],
            ['script_id' => 3, 'order_no' => 1, 'name' => 'Az Úr és Lucifer', 'action' => 'beszélgetnek', 'projection' => 'égbolt'],
            ['script_id' => 3, 'order_no' => 2, 'name' => 'Ádám és Éva', 'action' => 'első emberpár megjelenik'],
        ]);
    }
}
