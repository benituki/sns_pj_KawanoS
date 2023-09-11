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
    // ※修正する。
    // 多：多　→３テーブル
    // フォロー図テーブルが仲介
    // フォローボタンの切り替えのためである。フォローボタン機能自体はリレーション
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }
    // followers() メソッド：このメソッドは「フォロワー」を表す関数です。つまり、このユーザーをフォローしている他のユーザーを取得します。
    // return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');：これはEloquentの「多対多」のリレーションシップを設定しています。このメソッドは、User モデルが他の User モデルと多対多の関係を持つことを示しています。
    // User::class：リレーションシップの相手先モデルを指定しています。この場合、他のユーザーモデルとの関係を示しています。
    // 'follows'：中間テーブルの名前を指定しています。中間テーブルは、フォロー関係を格納するためのテーブルです。
    // 'following_id' と 'followed_id'：中間テーブル内の外部キーを指定しています。
    // following_id' はこのユーザー（自身）をフォローしている他のユーザーを関連付け、
    // 'followed_id' はこのユーザーがフォローしている他のユーザーを関連付けます。

    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        // 下記はGTPによって検索したものである。処理によるエラーが発生、読み込み不可能のためスクール内にて意味を再認識するようにする。
        // return $this->following->contains($users);
        return (boolean) $this->following()->where('followed_id', $user_id)->first(['followed_id']);

    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['followed_id']);
    }
    
    // $this->follows()///リレーションにアクセスする
    // リレーションにアクセスし、リレーション内でカラムが指定された（一致するレコード）を検索条件とし指定する（フォロー関係を検索している。）→検索条件に一致する最初のレコード（取得するカラムを指定している。）
    // boolean->真偽値,（真か偽か）
    // whereメソッド→DBクエリをフィルタリングするためのもの、特定の条件を設定するもの。
    // 

}

