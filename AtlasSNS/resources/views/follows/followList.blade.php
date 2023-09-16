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