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

    //エラーメッセージ（2023/01/15）
    // public function messages(): array
    // {
    //     return [
    //         'username.required' => '名前を入力してください。',
    //         'mail.required' => 'メールアドレスを入力してください。',
    //         'password-confirm.required' => 'パスワードを入力してください。',
    //         'password.required' => 'パスワードを入力してください。'
    //     ];
    // }

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
        ]);

    }


    // public function registerForm(){
    //     return view("auth.register");
    // }
    // 登録ボタンを押した際の処理
    public function register(Request $request){
        if($request->isMethod('post')){ //POstで送られた時
            $data = $request->input();//送られたデータを$dataに代入
            //↓追（2023/01/09）
            $validator=$this->validator($data);//validatorメソッドに移動
            $username=$request->input('username');
            if ($validator->fails()) {
                return redirect('/register')//registerに留まる
                ->withErrors($validator)//エラーを持ってくる
                ->withInput();
            }
            //終わり
            $this->create($data);//createメソッドに移動
            return redirect('/added') -> with('username', $username);//完了ページに移動する
        } else {
            return view('auth.register',['msg' => 'OK']);
        }
        
    }

    public function added(Request $request){
        $id = $request->input('id');
        $user = User::find($id);
        return view('auth.added', compact('user'));
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

