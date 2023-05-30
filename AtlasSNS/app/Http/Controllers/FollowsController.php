<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
        return $this->belongsTo(User::class, 'follower_id');
    }
    public function followerList(){
        return view('follows.followerList');
        return $this->belongsTo(User::class, 'following_id');
    }

}
