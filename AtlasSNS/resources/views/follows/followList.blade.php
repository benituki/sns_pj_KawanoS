{{-- @extends('layouts.login')

@section('content')
<h1>フォローリスト</h1>
<h1>Following</h1>
<ul>
    @foreach($following as $follower)
        <li>
            <img src="{{ $follower->icon_url }}" alt="{{ $follower->username }}">
            {{ $follower->username }}
        </li>
        <p>名前：{{ $follower->username }}</p>
        <p>投稿内容：{{ $follower->post }}</p>
    @endforeach
</ul> --}}

@extends('layouts.login')

@section('content')
<h1>フォローリスト</h1>
<h1>Following</h1>
<ul>
    @foreach($following as $follower)
        <li>
            <img src="{{ $follower->icon_url }}" alt="{{ $follower->username }}">
        </li>
    @endforeach
</ul>

<!-- フォローユーザーのツイートを表示 -->
<h1>フォローユーザーのツイート</h1>

@if($follow_tweets->count() > 0)
    <ul>
        @foreach($follow_tweets as $tweet)
            <li>
                <strong>{{ $tweet->user->username }}</strong>
                <p>{{ $tweet->post }}</p>
                <small>{{ $tweet->created_at }}</small>
            </li>
        @endforeach
    </ul>

@else
    <p>フォローユーザーのツイートはありません。</p>
@endif

@endsection

