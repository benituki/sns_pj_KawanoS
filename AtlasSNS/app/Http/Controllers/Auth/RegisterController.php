<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


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
            'username' => 'required|min:2|max:12',
            'mail' => 'required|min:5|max:40',
            'password-confirm' => 'required|alpha_desh|min:8|max:20|same:Password',
            'Password' => 'required|alpha_desh|min:8|max:20'

            // 'username' => 'required|string|max:255',
            // 'mail' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:4|confirmed',
        ]);

        // //エラー画面（2022/01/10）
        // if ($data) {
        //     //エラー発生時の処理
        //     return redirect('/added')
        //     ->withErrors($data)
        //     ->withInput();
        // }

        
    }

    

    // public function message()
    // {
    //             // エラーの内容を書く
    //     return [
    //         'username.required' => ':attributeを入力してください。',
    //         'username.min' => ':attributeは2文字以上で入力してください。',
    //         'username.max' => ':attributeは12文字以下で入植してください。'
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

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            //↓追（2023/01/09）
            $this->validator($data);
            //終わり
            $this->create($data);
            return redirect('/added')
            ->withErrors($data)
            ->withInput();
        } else {
            return view('auth.register',['msg'=>'正しく入力されました。']);
        }
        
    }

    public function added(){
        return view('auth.added');
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

