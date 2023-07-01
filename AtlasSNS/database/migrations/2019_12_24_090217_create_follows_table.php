<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            // idカラムを作成、autoIncrementはこのカラムが自動割分のプライマリキーであることを指す
            $table->integer('id')->autoIncrement();
            // 'following_id'カラムを作成。integerメソッドは符号付整数カラムを定義する。フローを行うユーザーのIDを格納する。
            $table->integer('following_id');
            // 'followed_id'というカラムを作成。フォローされる側のユーザーのIDを格納する。
            $table->integer('followed_id');
            // 'created_at'というタイムスタンプカラムを作成。timestampメソッドはタイムスタンプを格納するためのカラムを定義する。useCurrentメソッドはこのカラムのdフォルト値として現在の日付を使用することを示す。
            $table->timestamp('created_at')->useCurrent();
            // 'updated_at'というタイムスタンプカラムを作成。レコードが更新された時の日付を格納するために使用される。defaultメソッドを使用してカラムのｄフォルト値としてDB::rawメソッドを介して「current_timestamp on update current_timestamp」というデータベース固有の構文を指定しています。これにより、レコードが更新されたときに自動的に現在の日時が設定されます。
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
