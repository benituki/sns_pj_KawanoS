@extends('layouts.login')

@section('content')
<h1>検索</h1>

<div>
    <form action="{{ route('posts.index') }}" method="GET">
        <input type="text" name="keyword" value="">
        <input type="submit" value="検索">
    </form>
</div>


@endsection