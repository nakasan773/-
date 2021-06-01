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
                'text_title' => 'テストタイトル' .$i,
                'text'       => 'これはテスト投稿' .$i,
                'image'      => 'sample.jpg',
                'city_id'    => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
