@extends('layouts.login')

@section('content')
<h1>フォローリスト</h1>
<h1>Following</h1>
<ul>
    @foreach($following as $follower)
        <li>{{ $follower->username }}</li>
    @endforeach
</ul>
@endsection