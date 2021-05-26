<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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
                'screen_name' => 'test_user' .$i,
                'name' => 'TEST' .$i,
                'email'  => 'test' .$i .'@test.com',
                'password' => Hash::make('12345678'),
                'profile_image'  => 'noimage.png',
                'age' => '2' .$i,
                'single_comment' => 'ひとこと' .$i,
                'user_sex_id' => 1,
                'remember_token' => str_random(10),
                'created_at'  => now(),
                'updated_at' => now()
            ]);
        }
    }
}
