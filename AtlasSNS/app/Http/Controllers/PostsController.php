<?php

namespace App\Http\Controllers;

//バリエーションコントローラー作成（2022/12/25）追加↓
use App\Http\Controllers\Controller;
//
use Illuminate\Http\Request;

//追加
use App\Post;
use App\User;
use App\Models\tweets;



use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $list = Post::with('user')->get();
        // dd($list);
        // with「一緒に」「～と」
        // Post、User　テーブル
        // get()内はカラム名※ただし情報が今回多いため必要なし
        // Post、Userモデルの情報を取得する。
        return view('posts.index', ['list' => $list]);
        // posts.index（フォルダ名,index.blade.phpが格納されているフォルダ名が「posts」）
        //list「キー」、$list「値」
        // posts.indexと一緒に$listを画面に表示する。
    }


    //投稿用メソッド新規作成
    public function tweet(Request $request)//投稿（textarea）から情報を読み込む
    {
        //↓ここまでの内容が実行できているか確認のため「dd()」
        // dd($request);
        $post = $request->input('newPost');// $○○やメソッドは名前を自由にできる（※個別名などは分かりずらくなる可能性がある。）
        // 参考サイト↓https://qiita.com/ucan-lab/items/a7441bff64ff1f173c10
        $id = Auth::id();//Auth(日本語名：認証)ログインをしているユーザー情報を取得する。

        Post::create([
            // ''内はカラム！カラムに$を入れる。
            'post' => $post,
            //ログインしているユーザーのID↓
            'user_id' => $id,
        ]);
        return redirect('/top');
    }

    // フォロワーユーザーのつぶやきを取得する

    //投稿編集メソッド
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        Post::where('id', $id)->update(['post' => $up_post]);

        return redirect('/top');
    }

    // 削除用メソッド
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}