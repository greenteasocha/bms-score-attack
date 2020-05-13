<?php

use Illuminate\Database\Seeder;
use App\Models\Contest;

class ContestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventDate = "2020-05-01";
        for($i = 0; $i < 30; $i++){ 
            Log::debug($eventDate);
            
            Contest::create([
                'musicId' => rand(1, 1030),
                'contestDivision' => 1,
                'eventDate' => $eventDate,
            ]);
            $eventDate = date("Y-m-d", strtotime($eventDate . "+1 day"));
        }
    }
}
