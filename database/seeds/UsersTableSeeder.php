<?php

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
        DB::table('users')->insert([
            'user_name' => 'sample',
            'email' => 'sample@sample.com',
            'password' => 'sample',
            'comment' => 'samplesamplesample',
            'age' => '24',
            'gender' => '男',
            'residence' => '北海道',
        ]);
    }
}
