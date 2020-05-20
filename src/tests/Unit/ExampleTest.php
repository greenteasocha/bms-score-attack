<?php

namespace Tests\Unit;

use App\Models\Contest;
use App\Models\Music;
use App\Models\User;
use Tests\TestCase;
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

    // public function testBasicPatterns(){
    //     $this -> assertTrue(True);

    //     $arr = [];
    //     $this -> assertEmpty($arr);

    //     $msg = "Hello";
    //     $this -> assertEquals("Hello", $msg);

    //     $n = random_int(0, 100);
    // //     $this -> assertLessThan(100, $n);
    // }

    // public function testRouting(){
    //     $response = $this->get('/contests');
    //     $response->assertStatus(200);

    //     $musics = factory(Music::class, 1)->create();
    //     Contest::create([
    //         'musicId' => 1,
    //         'contestDivision' => 1,
    //         'eventDate' => "2020-04-01",
    //     ]);

    //     // コンテストページのテスト
    //     $response = $this->get('/contests/1');
    //     $response->assertStatus(200);
    //     $response = $this->get('/contests/2');
    //     $response->assertStatus(404);

    //     // ユーザページのテスト
    //     $user = factory(User::class, 10)->create();
    //     $response = $this->get('/users/1');
    //     $response->assertStatus(200);
    //     $response = $this->get('/users/11');
    //     $response->assertStatus(404);

    // }
    
}
