<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // App\Models\User::truncate();
        // 5人のbotを登録(MAX, 95%, AAA(88%), AA(77%), A(66%))
        $user = new User();
        $user->fill([
            'userName' => 'Mr.100%',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email' => '100per.com',
        ])->save();
        $user = new User();
        $user->fill([
            'userName' => 'Mr.95%',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email' => '95per.com',
        ])->save();
        $user = new User();
        $user->fill([
            'userName' => 'Mr.AAA',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email' => '88per.com',
        ])->save();
        $user = new User();
        $user->fill([
            'userName' => 'Mr.AA',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email' => '77per.com',
        ])->save();
        $user = new User();
        $user->fill([
            'userName' => 'Mr.A',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email' => '66per.com',
        ])->save();
        // $users = factory(App\Models\User::class, 10)->create();
    }
}
