<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    // 検索
    public function search(Request $request){
        return view('users.search');
        // //  キーワード受け取り
        //  $keyword = $request->input('keyword');

        //  // クエリ生成
        //  $query = User::query();
 
        //  // もしキーワードがあったら
        //  if(!empty($keyword))
        //  {
        //      $query->where('name', 'like', '%'.$keyword.'%')->orWhere('mail', 'link', '%'.$keyword.'%');
        //  }
 
        //  // ページネーション
        //  $date = $query->orderBy('created_at', 'desc')->paginate(10);
        //  return view('crud.index')->with('data', $date)
        //  ->with('keyword',$keyword)
        //  ->with('message','ユーザーリスト');

        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%.$keyword.%")
                ->orWhere('name', 'like', "%.$keyword.");
        }

        $posts = $query->get();

        return view('search', compact('posts', 'keyword'));
    }

}
