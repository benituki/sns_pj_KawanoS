<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //1対多リレーション（１）
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    //フォロワーフォロー取得
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_id');
    }
}

