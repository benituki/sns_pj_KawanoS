@extends('layouts.login')

@section('content')
<h1>検索</h1>

<div>
    <form action="{{ route('posts.index') }}" method="GET">
        <input type="text" name="keyword" value="">
        <input type="submit" value="検索">
    </form>
</div>

{{-- @foreach ($list as $list)
<tr>
    <tb><a href="{{ rotue('posts.show' ,$list)}}">{{ $list->title }}</a></tb>
    <tb>{{ $list->author }}</tb>
</tr>
@empty
<tb>No posts!!</tb>
@endforelse --}}


@endsection