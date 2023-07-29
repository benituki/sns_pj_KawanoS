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
        {{-- onclickではなく別の方法でuseridを送る。ヒント（投稿削除機能） --}}
        <button onclick="follows({{ $users->id }})">フォローする</button>
    </div>
    @endforeach
  </body>

@endsection