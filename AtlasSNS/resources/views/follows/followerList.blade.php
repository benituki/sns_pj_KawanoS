@extends('layouts.login')

@section('content')
<h1>フォロワーリスト</h1>
<ul>
    @foreach($followers as $follower)
        <li>{{ $follower->username }}</li>
    @endforeach
</ul>
@endsection