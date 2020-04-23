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
                Score::create([
                    'contestId' => $contestIdx + 3,
                    'score' => $faker->numberBetween(1000, 8000),
                    'submitedAt' => '2020-04-01 00:00:00',
                ]);
            };
        };
    }
}