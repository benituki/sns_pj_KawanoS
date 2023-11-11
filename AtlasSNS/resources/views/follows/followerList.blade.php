@extends('layouts.login')

@section('content')
<h1>フォロワーリスト</h1>
<ul>
    @foreach($followers as $follower)
        <li>
            <img src="/storage/{{$follower->images}}" alt="{{ $follower->username }}">
        </li>
    @endforeach
</ul>

@if($follower_tweets->count() > 0)
    <ul>
        @foreach($follower_tweets as $tweet)
            <li>
                <strong>{{ $tweet->user->username }}</strong>
                <p>{{ $tweet->post }}</p>
                <small>{{ $tweet->created_at }}</small>
            </li>
        @endforeach
    </ul>

@else
    <p>フォロワーユーザーのツイートはありません。</p>
@endif

@endsection


