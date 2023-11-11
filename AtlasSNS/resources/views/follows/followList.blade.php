@extends('layouts.login')

@section('content')
<h1>フォローリスト</h1>
<h1>Following</h1>
<ul>
    @foreach($following as $follower)
        <li>
            <img src="/storage/{{$follower->images}}" alt="{{ $follower->username }}">
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

