@extends('layouts.login')

@section('content')
<h1>フォロワーリスト</h1>
@foreach ($followers as $follower)
    <div>
        <p>{{ $follower->name }}</p>
        @if ($follower->is_following)
            <form action="{{ route('unfollow', $follower->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">フォロー解除</button>
            </form>
        @else
            <form action="{{ route('follow', $follower->id) }}" method="POST">
                @csrf
                <button type="submit">フォローする</button>
            </form>
        @endif
    </div>
@endforeach