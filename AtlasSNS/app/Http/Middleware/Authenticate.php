<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    // ユーザーが認証されていない場合にリダイレクトするパスを返す。
    {
        if (! $request->expectsJson()) {
            // 引数として受け取った$requestオブジェクトがJSONを期待していない場合にloginルートへリダイレクト先を返す
            return route('login');
        }
    }

    //ログイン後に表示するページにアクセス制限をかける
    // public function handle($request, Closure $next)
    // {
    //     if (Auth::check()) {
    //         return $next($request);
    //     }

    //     return redirect('/login');
    // }
}

