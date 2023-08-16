@extends('layouts.login')

@section('content')
<h1>検索</h1>

<form method="GET" action="{{ route('posts.index')}}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset( $search )) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('posts.index') }}" class="text-white">
            クリア
            </a>
        </button>
    </div>
</form>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <!-- ユーザー一覧の表示とフォローボタン -->
    @foreach($users as $users)
    <div>
        <div>{{ $users->username }}</div>
        {{-- JavaScript --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- onclickではなく別の方法でuseridを送る。ヒント（投稿削除機能） --}}
        {{-- <button class="follow-button" data-user-id="{{ $users->id }}">フォローする</button> --}}
        {{-- 下記追加 --}}
        {{-- <button class="follow-button" data-user-id="{{ $users->id }}" data-following="{{ Auth::users()->following->contains($users->id) ? 'true' : 'false' }}">
            {{ Auth::users()->following->contains($users->id) ? 'フォロー解除' : 'フォローする' }}
        </button> --}}
        <form action="/follow/{{ $users->id }}" method="POST">
            @csrf
            <button class="follow-button" type="submit">
                {{ Auth::users()->following->contains($users->id) ? 'フォロー解除' : 'フォローする' }}
            </button>
        </form>
        {{--　上記追加 --}}
    </div>
    @endforeach

  </body>

  {{-- ボタン。 --}}

  {{-- フォロー機能 --}}

@endsection