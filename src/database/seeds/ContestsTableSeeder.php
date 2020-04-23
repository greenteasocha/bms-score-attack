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
        for($i = 0; $i < 10; $i++){ 
            // 2020-04-01よりyyyymmddで10日分
            $y = '2020';
            $m = '4';
            $d = '01';
            $holdedDate = date('Y-m-d', mktime(0, 0, 0, $m, $d + $i, $y));
            
            Contest::create([
                'musicId' => $i + 24,
                'contestDivision' => 1,
                'holdedDate' => $holdedDate,
            ]);
        }
    }
}
