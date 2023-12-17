@extends('layouts.login')

@section('content')

<div class="followList">
    <h1>Folower List</h1>
    <ul>
        @foreach($followers as $follower)
        <li>
            <a href="{{ route('profile', [$follower->id]) }}">
                <td><img src="/storage/{{$follower->images}}" alt="{{ $follower->username }}"></td>
            </a>
        </li>
        @endforeach
    </ul>
</div>

<div class="line"></div>


<div class="container">
    <div>
        @if($follower_tweets->count() > 0)
        <ul>
             @foreach($follower_tweets as $tweet)
            <li class="post-follow-block">
                <figure>
                    <a href="{{ route('profile', [$tweet->user->id]) }}">
                        <td><img src="/storage/{{ $tweet->user->images }}"></td>
                    </a>
                </figure>
                <div class="post-follow-content">
                    <div>
                        <div class="post-name">{{ $tweet->user->username }} さん</div>
                        <div>{{ $tweet->created_at }}</div>
                    </div>
                    <div>{{ $tweet->post }}</div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
        <p>フォローユーザーのツイートはありません。</p>
        @endif
    </div>
</div>
@endsection



{{-- 念のため残す --}}
{{-- @if($follower_tweets->count() > 0)
    <ul>
        @foreach($follower_tweets as $tweet)
            <li>
                <a href="{{ route('profile', [$tweet->user->id]) }}">
                    <td><img src="/storage/{{ $tweet->user->images }}"></td>
                </a>
                <strong>{{ $tweet->user->username }}</strong>
                <p>{{ $tweet->post }}</p>
                <small>{{ $tweet->created_at }}</small>
            </li>
        @endforeach
    </ul>

@else
    <p>フォロワーユーザーのツイートはありません。</p>
@endif --}}