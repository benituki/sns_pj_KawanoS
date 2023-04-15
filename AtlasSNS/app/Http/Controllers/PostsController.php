<?php

namespace App\Http\Controllers;

//バリエーションコントローラー作成（2022/12/25）追加↓
use App\Http\Controllers\Controller;
//
use Illuminate\Http\Request;

//追加
use App\Post;
use App\User;

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

    //バリエーションコントローラー作成（2022/12/25）追加↓
    /**
     * 新ブログポスト作成フォームの表示
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * 新しいブログポストの保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //プロぐポストのバリエーションと保存コート。。。
    }

    //投稿用メソッド新規作成
    public function tweet(Request $request)
    {
        //↓ここまでの内容が実行できているか確認のため「dd()」
        // dd($request);
        $post = $request->input('newPost');
        // 参考サイト↓https://qiita.com/ucan-lab/items/a7441bff64ff1f173c10
        $id = Auth::id();
        Post::create([
            'post' => $post,
            //ログインしているユーザーのID↓
            'user_id' => $id,
        ]);
        return redirect('/top');
    }

    //投稿編集メソッド
    public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        Post::where('id', $id)->update(['post' => $up_post]);

        return redirect('/top');
    }

}
