<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function postValidates(Request $request)
{
  $request->validate([
    'name' => 'required',
    'age' => 'integer | between:0,150',
    'sex' => ['max:1', 'regex:/^[男|女]+$/u'],
  ];)
  return view('sample.index',['msg'=>'OK']);
}
}

// 記述方法：$request->validate(['検証の配列']);

