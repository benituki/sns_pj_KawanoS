<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ダミーユーザー
        DB::table('users')->insert([
            'username' => 'test',
            'mail' => 'test@test',
            'password' => bcrypt('test123'),
            'images' => 'images/icon1.png', // デフォルトアイコンのパス
        ]);
    }
}
