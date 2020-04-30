<?php

use App\Models\Score;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($userIdx = 0; $userIdx < 10; $userIdx++){ 
            for($contestIdx = 0; $contestIdx < 10; $contestIdx++){
                
                // 2020-04-01よりyyyymmddで10日分
                $y = '2020';
                $m = '4';
                $d = '01';
                $eventDate = date('Y-m-d', mktime(0, 0, 0, $m, $d + $contestIdx, $y));
                $createdAt = $eventDate . ' 00:00:00';
                
                Score::create([
                    'userId' => $userIdx + 1,
                    'contestId' => $contestIdx + 1,
                    'score' => $faker->numberBetween(1000, 8000),
                    'created_at' => $createdAt,
                ]);
            };
        };
    }
}