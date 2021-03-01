<?php

use Illuminate\Database\Seeder;

class MicropostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $microposts = [
            [
                'user_id'       => 1,
                'content'       => 'テスト投稿1',
            ],
            [
                'user_id'       => 1,
                'content'       => 'テスト投稿2',
            ],
            [
                'user_id'       => 2,
                'content'       => 'テスト投稿3',
            ],
        ];

        foreach ($microposts as $micropost) {
            Micropost::create($micropost);
        }
    }
}
