<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 下記はuse文が不足していたため追加。
use Illuminate\Support\Facades\Auth;
Use Illuminate\Validation\Rule;
//
use APP\Post;
use App\User;

class UsersController extends Controller
{
    // プロフィール編集画面表示
    public function show()
    {
        $users = Auth::user();
        return view('users/profile', ['users' => $users]);
    }

    // プロフィール編集編集機能
    public function profileUpdate(Request $request, User $users)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'mail' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'password' => 'min:8|max:20',
            'password-confirm' => 'min:8|max:20|same:password',
            'bio' => 'max:150',
            'images' => 'image|mimes:jpeg,png,gif,svg'
        ]);

        $users = Auth::user();
        $users->username = $request->input('username');
        $users->mail = $request->input('mail');
        $users->password = bcrypt($request->input('password'));
        $users->bio = $request->input('bio');

        $images = $request->images;
        // 
        if($images->isValid()){
            $filePath = $images->store('public/images');
            $users->images = str_replace('public/', '', $filePath);
        }
        
        $users->save();

        return redirect()->route('top')->with('users', $users);
    }

    public function search(Request $request) {
        $search = $request->input('search');
        // ログインユーザーのIDを取得
        // $requestオブジェクトはHTTPリクエストに関する情報を持つオブジェクト（例；ユーザーからのフォーム送信やGETリクエストなどが含まれる）
        // HTTPリクエストとは：GET、POST、PUT（PATCH）、DELETEなどのweb上の城尾法を取得したりデータを送信したりするために使用される。
        //input('search')は$requestオブジェクトから指定されたキー（ここではsearch）に関するデータを取得しようとする。
        // 取得したデータは変数$searchに代入される。この変数にはユーザーが検索フォームに入力したキーワードやテキストが格納されている。
        // 例；ユーザーが検索フォームに”川野詩織”と入力した場合$searchには’川野詩織’という文字列が格納される。これにより後続のコードで検索にしゆおう出来るようになる。
        $loggedInUserId = Auth::id();
        // クエリビルダ
        $query = User::query();
        // もし検索フォームのキーワードが入力されたら
        // User::query:'User'モデルに対してクエリを行うための新しいクエリビルダインスタンスを作成する。
        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');
            // 単語を半角スペースを区切り、配列にする
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            // 単語をループで回し、ユーザーネームと一致するものがあれば$queryに追加
            foreach ($wordArraySearched as $value) {
                $query->where('username', 'like', '%' . $value . '%');
            }
            // 自分自身を除外する条件を追加
            $query->where('id', '!=', $loggedInUserId);
            // ページネート
            $users = $query->paginate(20);
        } else {
            // もし検索フォームにキーワードが入力されていない場合、自分以外のユーザーをすべて取得
            $users = User::where('id', '!=', $loggedInUserId)->paginate(20);
        }
        // ビューにusersとsearchを変数として渡す
        return view('users.search', compact('users', 'search'));
    }
}
