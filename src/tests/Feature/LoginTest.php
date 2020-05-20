<?php

namespace Tests\Feature;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);


        $user = factory(User::class)->create([
            'password'  => bcrypt('password')
        ]);

        $this->assertFalse(Auth::check());
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'password'
        ]);

        $this->assertTrue(Auth::check());
 
        // ここにpostに関するテスト

        // ログイン後にホームページにリダイレクトされるのを確認
        $response->assertRedirect('home');

    }

    // 投稿フォーム表示のテスト(保留)
    // どうやらバージョンの関係でvisitが廃止されている？
    // public function testHomeView()
    // {
    //     $$this->browse(function ($browser) {
    //         $browser->visit('/home')
    //                 -> assertSee('BMS Daily Score Attack');
    //     });
    // }

}
