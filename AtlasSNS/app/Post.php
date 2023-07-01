<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Post extends Model
{
    //
    protected $fillable = [
        'post', 'user_id',
    ];

    //1体多リレーション（多）
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

