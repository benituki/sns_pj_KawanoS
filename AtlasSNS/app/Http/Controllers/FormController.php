<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    // 例)
public function test(Request $request){
  $rules = [
// バリデーションルール定義
'UserName' => ['required', 'min:2', 'max:12',]
  ];
// 引数の値がバリデートされればリダイレクト、されなければ引き続き処理の実行
$this->validate($request, $rules);
}
}

// 記述方法：$request->validate(['検証の配列']);

