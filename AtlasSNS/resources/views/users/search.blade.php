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

@foreach($users as $user)
    <a href="{{ route('users.show', ['user_id' => $user->id]) }}">
        {{ $user->username }}
    </a>
@endforeach

@endsection