@extends('layouts.login')

@section('content')
<h1>フォロワーリスト</h1>
<ul>
    @foreach($followers as $follower)
        <li>
            <img src="{{ $follower->icon_url }}" alt="{{ $follower->username }}">
            {{ $follower->username }}
        </li>
    @endforeach
</ul>
@endsection


