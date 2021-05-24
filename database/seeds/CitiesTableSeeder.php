<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'id' => 1,
                'city' => '北海道',
            ],
            [
                'id' => 2,
                'city' => '青森県',
            ],
            [
                'id' => 3,
                'city' => '秋田県',
            ],
            [
                'id' => 4,
                'city' => '岩手県',
            ],
            [
                'id' => 5,
                'city' => '山形県',
            ],
            [
                'id' => 6,
                'city' => '宮城県',
            ],
            [
                'id' => 7,
                'city' => '福島県',
            ],
            [
                'id' => 8,
                'city' => '栃木県',
            ],
            [
                'id' => 9,
                'city' => '茨城源',
            ],
            [
                'id' => 10,
                'city' => '千葉県',
            ],
            [
                'id' => 11,
                'city' => '群馬県',
            ],
            [
                'id' => 12,
                'city' => '埼玉県',
            ],
            [
                'id' => 13,
                'city' => '東京都',
            ],
            [
                'id' => 14,
                'city' => '神奈川県',
            ],
            [
                'id' => 15,
                'city' => '新潟県',
            ],
            [
                'id' => 16,
                'city' => '長野県',
            ],
            [
                'id' => 17,
                'city' => '山梨県',
            ],
            [
                'id' => 18,
                'city' => '静岡県',
            ],
            [
                'id' => 19,
                'city' => '富山県',
            ],
            [
                'id' => 20,
                'city' => '岐阜県',
            ],
            [
                'id' => 21,
                'city' => '石川県',
            ],
            [
                'id' => 22,
                'city' => '福井県',
            ],
            [
                'id' => 23,
                'city' => '愛知県',
            ],
            [
                'id' => 24,
                'city' => '滋賀県',
            ],
            [
                'id' => 25,
                'city' => '三重県',
            ],
            [
                'id' => 26,
                'city' => '京都府',
            ],
            [
                'id' => 27,
                'city' => '奈良県',
            ],
            [
                'id' => 28,
                'city' => '兵庫県',
            ],
            [
                'id' => 29,
                'city' => '大阪府',
            ],
            [
                'id' => 30,
                'city' => '和歌山県',
            ],
            [
                'id' => 31,
                'city' => '鳥取県',
            ],
            [
                'id' => 32,
                'city' => '岡山県',
            ],
            [
                'id' => 33,
                'city' => '島根県',
            ],
            [
                'id' => 34,
                'city' => '広島県',
            ],
            [
                'id' => 35,
                'city' => '山口県',
            ],
            [
                'id' => 36,
                'city' => '香川県',
            ],
            [
                'id' => 37,
                'city' => '徳島県',
            ],
            [
                'id' => 38,
                'city' => '高知県',
            ],
            [
                'id' => 39,
                'city' => '愛媛県',
            ],
            [
                'id' => 40,
                'city' => '福岡県',
            ],
            [
                'id' => 41,
                'city' => '大分県',
            ],
            [
                'id' => 42,
                'city' => '佐賀県',
            ],
            [
                'id' => 43,
                'city' => '熊本県',
            ],
            [
                'id' => 44,
                'city' => '宮崎県',
            ],
            [
                'id' => 45,
                'city' => '鹿児島県',
            ],
            [
                'id' => 46,
                'city' => '長崎県',
            ],
            [
                'id' => 47,
                'city' => '沖縄県',
            ],
        ]);
    }
}
