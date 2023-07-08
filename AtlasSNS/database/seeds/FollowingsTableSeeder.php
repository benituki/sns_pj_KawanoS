<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class FollowingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $following_data = [
            ['user_id' => 1, 'following_user_id' => 3], // 太郎さん（ID: 1）は三郎さん（ID: 3）をフォローしてる
            ['user_id' => 2, 'following_user_id' => 3], // 次郎さん（ID: 2）も三郎さん（ID: 3）をフォローしてる
            ['user_id' => 3, 'following_user_id' => 1], // 三郎さん（ID: 3）は、太郎さん（ID: 1）をフォローしてる
        ];
        
        foreach($following_data as $following_values) {

            $following = new \App\Following();
            $following->user_id = $following_values['user_id'];
            $following->following_user_id = $following_values['following_user_id'];
            $following->save();
        }
        
    }
}
