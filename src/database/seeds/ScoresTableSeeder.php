<?php

use App\Models\Score;
use App\Models\Contest;
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
    
        // userId: 1,2,3,4,5 = Mr.100%, 95%, AAA(88%), AA(77%), A(66%)
        for($contestId = 1; $contestId <= 30; $contestId++){
            Log::info("Score: Contest of " . $contestId);
            $contest = Contest::where('id', $contestId)->first();
            $music = $contest->music;   
            $score = new Score();
            $score->fill([
                'userId' => 1,
                'contestId' => $contestId,
                'score' => (int) ($music->totalNotes * 2)
            ])->save();
            $score = new Score();
            $score->fill([
                'userId' => 2,
                'contestId' => $contestId,
                'score' => (int) ($music->totalNotes * 2 * 0.95)
            ])->save();
            $score = new Score();
            $score->fill([
                'userId' => 3,
                'contestId' => $contestId,
                'score' => (int) ($music->totalNotes * 2 * 0.888)
            ])->save();
            $score = new Score();
            $score->fill([
                'userId' => 4,
                'contestId' => $contestId,
                'score' => (int) ($music->totalNotes * 2 * 0.777)
            ])->save();
            $score = new Score();
            $score->fill([
                'userId' => 5,
                'contestId' => $contestId,
                'score' => (int) ($music->totalNotes * 2 * 0.666)
            ])->save();
            
        };
    }
}