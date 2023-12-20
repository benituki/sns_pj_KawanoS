@extends('layouts.login')

@section('content')

<form method="GET" action="{{ route('posts.index')}}" class="search-form-container">
    <div class="search-container">
        <input type="search" placeholder="ユーザー名" name="search" value="@if (isset( $search )) {{ $search }} @endif" class="search-box">
    </div>
    <div class="button-container">
        <button type="submit" class="search-button">
            <img src="{{ asset('images/search-button.png') }}" alt="search-button">
        </button>
    </div>
    @if (isset($search) && !empty($search))
    <div class="search-word">検索ワード：{{ $search }}</div>
    @endif
</form>


<div class="line"></div>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <!-- ユーザー一覧の表示とフォローボタン -->
    @foreach($users as $user)
    <div class="user-container">
        <div class="user-details">
            <div class="username">{{ $user->username }}</div>
            <img src="/storage/{{$user->images}}" alt="User Icon" class="user-image">
        </div>
        @if(Auth::user()->isFollowing($user->id))
            <!-- フォロー解除ボタン -->
            <form action="{{ route('search_un_follow', ['id' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="unfollow-button">フォロー解除</button>
            </form>
        @else
            <!-- フォローボタン -->
            <form action="{{ route('search_follow', ['id' => $user->id]) }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="follow-button">フォローする</button>
            </form>
        @endif
    </div>
    @endforeach
</body>

@endsection