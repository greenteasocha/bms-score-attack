<?php

use App\Models\Music;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $path = base_path();
        $path = $path . "/data/URLLinks.json";
        $content = file_get_contents($path);
        // $content = Storage::get("data/URLLinks.json"); // Storageファサードを用いる方法 保留中
        $content = mb_convert_encoding($content, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($content,true);
        
        $numOfMusics = 1030; // 全曲の場合、1030
        for ($i = 1; $i <= $numOfMusics; $i++) {
            $musicData = $arr[$i];
            $score = new Music();
                $score->fill([
                    'musicName' => $musicData["Lv"] . " " . $musicData["Title"],
                    'totalNotes' => $musicData["total_notes"],
                    'LR2Link' => $musicData["URL"],
                ])->save();
        }

        // $musics = factory(App\Models\Music::class, 10)->create();　
    }
}
