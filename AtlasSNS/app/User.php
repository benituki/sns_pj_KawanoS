<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
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
    protected $table = 'users';

    // ユーザーがフォローしている人のリレーション
    public function following()
    {
        return $this->belongsToMany(\App\User::class, 'follows', 'followed_id', 'following_id');
    }

    // ユーザーをフォローしている人のリレーション
    public function followers()
    {
        return $this->belongsToMany(\App\User::class, 'follows', 'following_id', 'followed_id');
    }
}

