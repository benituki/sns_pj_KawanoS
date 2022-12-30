<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    // 例)
public function test(Request $request){
  $$request->validate ([
    //ユーザー登録機能
    'UserName' => 'required'|'min:2'|'max:12',
    'MailAdress' => ['required', 'min:5', 'max:40'],
    'PasswordConfirm' => ['required', 'alpha_desh', 'min:8', 'max:20', 'same:Password'],
    'Password' => ['required', 'alpha_desh', 'min:8', 'max:20']
  ]);
  // 引数の値がバリデートされればリダイレクト、されなければ引き続き処理の実行
  //バリデーション完了後
$this->validate($request, $rules);
}
}

// 記述方法：$request->validate(['検証の配列']);

