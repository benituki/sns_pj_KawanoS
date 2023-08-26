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

    public function follow($id)
    {
        // ログイン中のユーザーを取得
        $loggedInUser = Auth::users();

        // フォローするユーザーを取得
        $userToFollow = User::find($id);

        // フォロー関係を保存
        $loggedInUser->following()->attach($userToFollow);

        return redirect()->back(); // フォロー後に元のページに戻る
    }

    public function un_follow($id)
    {
        // ログイン中のユーザーを取得
        $loggedInUser = Auth::users();

        // フォロー解除するユーザーを取得
        $userToUn_follow = User::find($id);

        // フォロー関係を解除
        $loggedInUser->following()->detach($userToUn_follow);

        return redirect()->back(); // フォロー解除後に元のページに戻る
    }


}
