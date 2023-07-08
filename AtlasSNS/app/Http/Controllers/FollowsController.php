<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
}
