<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    public function follow(User $user)
    {
        // フォローする処理
        auth()->user()->following()->attach($user->id);

        return back()->with('success', 'ユーザーをフォローしました。');
    }

    public function unfollow(User $user)
    {
        // フォローを解除する処理
        auth()->user()->following()->detach($user->id);

        return back()->with('success', 'ユーザーのフォローを解除しました。');
    }

}
