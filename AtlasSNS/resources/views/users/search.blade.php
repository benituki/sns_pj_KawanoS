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

{{-- @foreach($users as $user)
    <a href="{{ route('users.show', ['user_id' => $user->id]) }}">
        {{ $user->username }}
    </a>
@endforeach --}}

{{-- @foreach($users as $user)
<div>
  <div>{{$user->username}}</div>
  <button>フォローする</button>
</div>
@endforeach --}}
{{-- フォロー登録、解除 --}}
{{-- @foreach($users as $user)
<div>
  <div>{{$user->username}}</div>
  <button onclick="follow({{ $user->id }})">フォローする</button>
</div>
@endforeach --}}


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <!-- ユーザー一覧の表示とフォローボタン -->
    @foreach($users as $user)
    <div>
      <div>{{$users->username}}</div>
      <button onclick="follow({{ $users->id }})">フォローする</button>
    </div>
    @endforeach
  
<!-- AjaxリクエストのためのJavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  function follow(userId) {
    $.ajax({
      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
      url: `/follow/${userId}`,
      type: "POST",
    })
    .done((data) => {
      console.log(data);
    })
    .fail((data) => {
      console.log(data);
    });
  }
</script>
  </body>

@endsection