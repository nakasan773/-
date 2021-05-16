<?php

use Illuminate\Database\Seeder;
use App\Models\Sex;

class User_SexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_sexes')->insert([
            [
                'id' => 1,
                'sex' => '男性',
            ],
            [
                'id' => 2,
                'sex' => '女性',
            ],
            [
                'id' => 3,
                'sex' => '不明',
            ],
        ]);
    }
}
