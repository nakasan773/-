<?php

use Illuminate\Database\Seeder;
use App\Models\Tweet;


class TweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Tweet::create([
                'user_id'    => $i,
                'text'       => 'これはテスト投稿' .$i,
                'image'  => 'https://placehold.jp/50x50.png',
                'city_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
