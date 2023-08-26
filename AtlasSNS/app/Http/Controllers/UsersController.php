<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Post;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    // 検索
    public function search(Request $request){
        // return view('users.search');
        // return viewは、laravelにおけるビューの表示を行うためのコード
        // このコードはusers/search.blade.phpというビューファイルを表示するために使用される。
        // view()関数はlaravelでビューを表示するために使用されるヘルパー関数。この関数に引数としてビューファイルのパスを指定することで、該当するビューファイルを表示する準備が整う。

        // ユーザー一覧をページネートで習得
        $users = User::paginate(20);
        // 検索フォームで入力された値を習得する
        $search = $request->input('search');
        // クエリビルダ
        $query = User::query();
        // もし検索フォームのキーワードが入力されたら
        if($search){
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースを区切り、配列にする（例：”川野 詩織 -> ["川野","詩織"])
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームとぶっ分一意するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('username', 'like', '%'.$value.'%');
            }
            // 上記で習得した$queryをページネートにし変数$usersに代入
            $users = $query->paginate(20);
        }
        // ビューにusersとsearchを変数として渡す
        return view('users.search', ['users' => $users])
        ->with([
            'users' => $users,
            'search' => $search,
        ]);
    }

    // フォローボタン
    public function follow(User $users)
    {
        Auth::users()->following()->attach($users);
        return response()->json(['message' => 'フォローしました']);
    }
}
