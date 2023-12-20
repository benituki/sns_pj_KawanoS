<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    // フォロワーリスト
    public function followerList()
{
    $user = auth()->user(); // ログインユーザーを取得
    $followers = $user->followers; // フォロワーのユーザーを取得

    $follower_ids = $followers->pluck('id')->toArray();

    $follower_tweets = Post::with('user')
        ->whereIn('user_id', $follower_ids)
        ->latest()
        ->paginate(10);


    return view('follows.followerList', compact('followers', 'follower_tweets'));
}

    // フォローリスト
    // viewが一緒なら、一つにまとめる。
    public function followList()
{
    $user = auth()->user(); // ログインユーザーを取得
    $following = $user->following; // フォロー中のユーザーを取得

    $follow_ids = Auth::user()->following()->pluck('followed_id')->toArray();
    
    // フォローユーザーのツイートを取得
    $follow_tweets = Post::with('user')
        ->whereIn('user_id', $follow_ids)
        ->latest() // 最新のツイートから取得
        ->paginate(10); // ページネーションを設定して10件ずつ表示

    return view('follows.followList', compact('following', 'follow_tweets'));
}

    public function follow($id)
    {
        // ログイン中のユーザーを取得
        $loggedInUser = Auth::user();
        // Auth::user()：Laravelの認証システムを介して現在ログインしているユーザーの情報を取得します。
        // $loggedInUser：取得したログイン中のユーザー情報を格納するための変数です。

        // フォローするユーザーを取得
        $userToFollow = User::find($id);
        // User::find($id)：User モデルを使用して、データベース内で指定されたユーザーID ($id) に対応するユーザーのレコードを検索・取得します。
        // find は、データベースから特定のレコードを取得するために一般的に使用されるメソッドの一つ
        // $userToFollow：取得したユーザー情報を格納するための変数です。この変数には、データベースから取得したユーザーの情報が含まれます。

        // フォロー関係を保存
        $loggedInUser->following()->attach($userToFollow);
        // $loggedInUser：ログインしているユーザーを表すEloquentモデルのインスタンスです。通常、これはログインしているユーザーの情報を持っています。
        // following()：Eloquentのリレーションシップメソッドで、$loggedInUser がフォローしているユーザー（フォロー中のユーザー）を表します。このメソッドは通常、User モデル内で定義されています。
        // attach($userToFollow)：following() リレーションシップに対して、指定したユーザー（$userToFollow）を関連付けます。つまり、$loggedInUser が $userToFollow をフォローしたことをデータベースに保存します。

        return redirect()->back()->withInput();  // フォロー後に元のページに戻る
        // redirect()：Laravelのリダイレクトを行うためのメソッドです。これを呼び出すことで、リダイレクト用のリダイレクトレスポンスが生成されます。
        // back()：back() メソッドは、ユーザーを前のURLに戻すための便利な方法です。これにより、現在のリクエストのリファラ（リクエストが発生した前のURL）にリダイレクトされます。一般的に、ユーザーがフォームを送信した後や、あるアクションを実行した後に元のページに戻るのに使用されます。
    }

    public function un_follow($id)
    {
        // ログイン中のユーザーを取得
        $loggedInUser = Auth::user();

        // フォロー解除するユーザーを取得
        $userToFollow = User::find($id);

        // フォロー関係を解除
        $loggedInUser->following()->detach($userToFollow);

        return redirect()->back()->withInput();  // フォロー解除後に元のページに戻る
    }

    public function search_follow($id)
    {
        // ログイン中のユーザーを取得
        $loggedInUser = Auth::user();

        // フォローするユーザーを取得
        $userToFollow = User::find($id);

        // フォロー関係を保存
        $loggedInUser->following()->attach($userToFollow);

        return redirect('/search');
    }

    public function search_un_follow($id)
    {
        // ログイン中のユーザーを取得
        $loggedInUser = Auth::user();

        // フォロー解除するユーザーを取得
        $userToFollow = User::find($id);

        // フォロー関係を解除
        $loggedInUser->following()->detach($userToFollow);

        return redirect('/search');
    }



}
