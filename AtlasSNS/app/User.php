<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Follow;



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

    // ユーザーが呟いた呟きを取得できるようにする
    // 'hasMany'メソッドを使用してリレーションを設定する。
    public function tweets()
    {
        return $this->hasMany(Post::class);
    }

    // フォロワーユーザーのつぶやきを取得する
    public function Follow()
    {
        return $this->belongsToMany(User::class, 'followers', 'followed_id', 'follower_id');
        // フォロワーユーザーのつぶやきを取得する
        $followers = Auth::user()->followers;
        $tweets = Tweet::whereIn('user_id', $followers->pluck('id'))->orWheres('users_id', Auth::id())->get();
    }
}

