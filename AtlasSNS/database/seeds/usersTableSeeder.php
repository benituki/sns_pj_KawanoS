<?php

use Illuminate\Database\Seeder;

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
            'password' => bcrypt('test123')
        ]);
    }
}
