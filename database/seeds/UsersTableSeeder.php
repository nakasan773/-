<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'user_name' => 'TEST' .$i,
                'email'  => 'test' .$i .'@test.com',
                'password' => Hash::make('12345678'),
                'profile_image'  => 'https://placehold.jp/50x50.png',
                'age' => '2' .$i,
                'user_sexes_id' => 1,
                'residence' => '北海道',
                'remember_token' => str_random(10),
                'created_at'  => now(),
                'updated_at' => now()
            ]);
        }
    }
}
