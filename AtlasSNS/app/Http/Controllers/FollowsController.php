<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    // フォロワーリスト用
    public function followerList(User $users)
    {
        $followers = $users->followers;
        return view('/follows/followerList', compact('followers'));
    }

    // フォローリスト用
    public function followList(User $users)
    {
        $following = $users->following;
        return view('/follows/followList', compact('following'));
    }

    // フォロー登録（2023/07/15）
    public function follow(User $users)
    {
        Auth::users()->following()->attach($users);
        return back();

    }

    // // フォロー解除（2023/07/15）
    public function un_follow(User $users)
    {
        Auth::users()->following()->detach($users);
        return back();
    }


    public function store($userId)
    {
        Auth::users()->follows()->attach($userId);
        return;
    }

    public function destroy($userId)
    {
        Auth::users()->follows()->detach($userId);
        return;
    }



}
