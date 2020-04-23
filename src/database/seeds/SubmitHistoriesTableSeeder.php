<?php

use App\Models\SubmitHistory;
use Illuminate\Database\Seeder;

class SubmitHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for($userIdx = 0; $userIdx < 10; $userIdx++){ 
            for($contestIdx = 0; $contestIdx < 10; $contestIdx++){
                SubmitHistory::create([
                    'scoreId' => $contestIdx + 2 + $userIdx * 10 ,
                    'userId' => $userIdx + 35,
                ]);
            };
        };
    }
}
