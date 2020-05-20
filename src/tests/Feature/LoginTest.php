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

    // public function testHomeView()
    // {
    //     $$this->browse(function ($browser) {
    //         $browser->visit('/home')
    //                 -> assertSee('BMS Daily Score Attack');
    //     });
    // }

}
// class LoginTest extends TestCase
// {
//     /** @test */
//     public function user_can_view_login()
//     {
//         $response = $this->get('login');
 
//         $response->assertStatus(200);
//     }
 
//     /** @test */
//     public function unauthenticated_user_cannot_view_home()
//     {
//         $this->get('home')
//             ->assertRedirect('login');
//     }
// }