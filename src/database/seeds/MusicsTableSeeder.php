<?php

use Illuminate\Database\Seeder;

class MusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\Music::truncate();
        $musics = factory(App\Models\Music::class, 10)->create();
    }
}
