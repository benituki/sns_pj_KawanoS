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
    // public function follow(User $following_id)
    // {
    //     Auth::users()->follows()->attach($following_id);
    //     return back();

    // }

    public function toggleFollow($id)
{
    $users = User::findOrFail($id);
    $loggedInUser = Auth::users();

    if ($loggedInUser->following->contains($id)) {
        $loggedInUser->following()->detach($id);
    } else {
        $loggedInUser->following()->attach($id);
    }

    return redirect()->back();
}

}
