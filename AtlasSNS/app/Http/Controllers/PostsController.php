<?php

namespace App\Http\Controllers;

//バリエーションコントローラー作成（2022/12/25）追加↓
use App\Http\Controllers\Controller;
//
use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
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

}
