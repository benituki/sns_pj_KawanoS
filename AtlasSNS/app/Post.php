<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'post', 'user_id',
    ];

    //1体多リレーション（多）
     public function posts()
     {
        return $this->hasMany('App\User');
    }
}
