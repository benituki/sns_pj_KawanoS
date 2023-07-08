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

    public function followerList(User $users)
    {
        $followers = $users->followers;
        return view('/follows/followerList', compact('followers'));
    }

    public function followList(User $users)
    {
        $following = $users->following;
        return view('/follows/followList', compact('following'));
    }
}
