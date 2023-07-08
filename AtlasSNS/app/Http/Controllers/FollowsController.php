<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    // public function follow(User $user)
    // {
    //     // フォローする処理
    //     auth()->user()->following()->attach($user->id);

    //     return back()->with('success', 'ユーザーをフォローしました。');
    // }

    // public function un_follow(User $user)
    // {
    //     // フォローを解除する処理
    //     auth()->user()->following()->detach($user->id);

    //     return back()->with('success', 'ユーザーのフォローを解除しました。');
    // }

    public function followers(User $user)
    {
        $followers = $user->followers;
        return view('followers', compact('followers'));
    }

    public function following(User $user)
    {
        $following = $user->following;
        return view('following', compact('following'));
    }

}
