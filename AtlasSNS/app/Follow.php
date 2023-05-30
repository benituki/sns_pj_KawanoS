<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //リレーションシップ
    public function user(){
        return $this->belongsTo(\App\User::class, 'id');
    }
}
// 上記のコードはfollowモデルの定義を示している。
