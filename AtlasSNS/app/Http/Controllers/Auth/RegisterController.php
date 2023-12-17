<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\View\ViewName;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|between:2,12',
            'mail' => 'required|string|between:5,40|unique:users|email:filter,dns',
            'password-confirm' => 'required|string|alpha_num|between:8,20|same:password',
            'password' => 'required|alpha_num|between:8,20'
            
        ]);

        return validator::make($data,[
            'username.required' => '名前を入力してください。',
            'mail.required' => 'メールアドレスを入力してください。',
            'password-confirm.required' => 'パスワードを入力してください。',
            'password.required' => 'パスワードを入力してください。'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
            'images' => 'images/CqT6aWcJZkNYUfG8EovYNT3rZXCP4eWSCtxvD6qy.png',
        ]);

    }


    // public function registerForm(){
    //     return view("auth.register");
    // }
    // 登録ボタンを押した際の処理
    public function register(Request $request){
        if($request->isMethod('post')){ // POSTで送信された場合
            $data = $request->input(); // 送信されたデータを$dataに代入

            // バリデーションを行う
            // ↓$dateが持ってきたusernameやpassなどを$validatorが確認。
             $validator = $this->validator($data);
            //↓usernameを変数にかける。
             $username = $request->input('username');

             if ($validator->fails()) { //validatorが確認した内容の中に不適合な記述があった場合下記の処理になる
                return redirect('/register') //新規入力画面に戻る
                    ->withErrors($validator) //バリデーションのエラーメッセージ
                    ->withInput(); //入力された値。エラー箇所は空欄になり、問題ない記述は記述されたまま。
            }

            $this->create($data); // ユーザーを作成する
            return redirect('/added')->with('username', $username); //完了ページにリダイレクトする、完了した際、usernameを/addedに引き渡す。
        } else {
            return view('auth.register', ['msg' => 'OK']); //GETリクエストの場合は登録フォーム(auth.register)を表示
        }
    }

    public function added(Request $request){
        $username = $request->session()->get('username'); //sessionに保存されているusernameを取得する。
        $user = User::where('username', $username)->first(); //User::ユーザーモデルを呼び出す。usernameを検索し取得する。検索出来たら最初の値を出す。

        return view('auth.added', compact('user')); // ユーザー情報を表示するビュー（auth.added）に$userを渡す
    }


//     /**
//      * * 新ブログポストの保存
//      * *
//      * * @param  \Illuminate\Http\Request  $request
//      * * @return \Illuminate\Http\Response
//      * */
//     public function store(Request $request)
//     {
//         // ブログポストは有効
//     }
}

