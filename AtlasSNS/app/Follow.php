<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Follow extends Model
{
    //リレーションシップ
    public function user(){
        return $this->belongsTo(\App\User::class, 'id');
    }

    protected $table = 'follows';
}
// 上記のコードはfollowモデルの定義を示している。


