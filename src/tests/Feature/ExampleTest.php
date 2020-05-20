<?php

namespace Tests\Feature;

use App\Models\Contest;
use App\Models\Music;
use App\Models\User;
use App\Models\Score;
use Tests\TestCase;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBasicPatterns(){
        $this -> assertTrue(True);

        $arr = [];
        $this -> assertEmpty($arr);

        $msg = "Hello";
        $this -> assertEquals("Hello", $msg);

        $n = random_int(0, 100);
    //     $this -> assertLessThan(100, $n);
    }

    public function testRouting(){
        $response = $this->get('/contests');
        $response->assertStatus(200);

        $musics = factory(Music::class, 1)->create();
        Contest::create([
            'musicId' => 1,
            'contestDivision' => 1,
            'eventDate' => "2020-04-01",
        ]);

        // コンテストページのテスト
        $response = $this->get('/contests/1');
        $response->assertStatus(200);
        $response = $this->get('/contests/2');
        $response->assertStatus(404);

        // ユーザページのテスト
        $user = factory(User::class, 10)->create();
        $response = $this->get('/users/1');
        $response->assertStatus(200);
        $response = $this->get('/users/11');
        $response->assertStatus(404);

    }
    
    public function testPostScore(){
        // ダミーデータの作成(music, contest, user)
        $musics = factory(Music::class, 1)->create();
        Contest::create([
            'musicId' => 1,
            'contestDivision' => 1,
            'eventDate' => "2020-04-01",
        ]);
        $user = factory(User::class)->create();
    
        // 認証済み、つまりログイン済みしたことにする
        $this->actingAs($user);

        // 初回投稿
        $response = $this->post('/contests/1',[
            "userId" => 1,
            "score" => 4000,
            "comment" => 'good',
        ]);
        $this->assertDatabaseHas('scores', [
            'contestID' => 1,
            'userId' => 1,
            'score' => 4000,
            'comment' => 'good'
        ]);
        $response->assertRedirect('/contests/1');
        
        // スコアの更新 古いスコアは残らない
        $response = $this->post('/contests/1',[
            "userId" => 1,
            "score" => 4500,
            "comment" => 'extremely good',
        ]);
        $this->assertDatabaseHas('scores', [
            'contestID' => 1,
            'userId' => 1,
            'score' => 4500,
            'comment' => 'extremely good'
        ]);
        $this->assertDatabaseMissing('scores', [
            'contestID' => 1,
            'userId' => 1,
            'score' => 4000,
            'comment' => 'good'
        ]);

        // スコアの更新 前回より低い場合は更新せず
        $response = $this->post('/contests/1',[
            "userId" => 1,
            "score" => 500,
            "comment" => 'poor',
        ]);
        $this->assertDatabaseMissing('scores', [
            'contestID' => 1,
            'userId' => 1,
            'score' => 500,
            'comment' => 'poor'
        ]);
        
        // コメントは空白でもOK
        $response = $this->post('/contests/1',[
            "userId" => 1,
            "score" => 9000,
            "comment" => null,
        ]);
        $this->assertDatabaseHas('scores', [
            'contestID' => 1,
            'userId' => 1,
            'score' => 9000,
            'comment' => null
        ]);

        // 無効な投稿があった場合、DBの更新をせずしれっと元のランキングに返す (警告の表示などは、TODO)
        // 空白
        $deletedRow = Score::where('id', 1)->delete();
        
        $response = $this->post('/contests/1',[
            "userId" => 1,
            "score" => '',
            "comment" => null,
        ]);
        Log::debug('Log => ', (array)$response);
        $response->assertStatus(302);

        // 数字以外
        $response = $this->post('/contests/1',[
            "userId" => 1,
            "score" => 'xyz',
            "comment" => null,
        ]);
        $response->assertRedirect('/contests/1');


    }

}
