@extends('layouts.login')

@section('content')
<h1>フォローリスト</h1>
<h1>Following</h1>
<ul>
    @foreach($following as $follower)
        <li>
            <img src="{{ $follower->icon_url }}" alt="{{ $follower->username }}">
            {{ $follower->username }}
        </li>
    @endforeach
</ul>
@endsection

{{-- フォローユーザー呟き --}}
<!-- フォローユーザーのツイート -->
<h2>フォローユーザーのツイート</h2>
<ul>
    @foreach($followingTweets as $tweet)
        <li class="post-block">
            <figure><img src="{{ $tweet->users->getIconUrlAttribute() }}" alt="{{ $tweet->users->username }}"></figure>
            <div class="post-content">
                <div>
                    <div class="post-name">{{ $tweet->users->username }}</div>
                    <div>{{ $tweet->created_at->format('Y-m-d') }}</div>
                </div>
                <div>{{ $tweet->post }}</div>
            </div>
        </li>
    @endforeach
</ul>