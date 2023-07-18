@extends('layouts.login')

@section('content')
<h1>フォロワーリスト</h1>

<!-- followers.blade.php -->
<h1>Followers</h1>
<ul>
    @foreach($followers as $followers)
        <li>{{ $follower->username }}</li>
    @endforeach
</ul>

