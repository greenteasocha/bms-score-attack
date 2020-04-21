<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Musics')->get();
        DB::table('Musics')->insert([
            'musicName' => 'LittleHearts',
            'totalNotes' => 3000,
            'downloadLink' => 'blacktrain',
        ]);
    }
}
