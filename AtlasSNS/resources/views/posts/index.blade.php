@extends('layouts.login')

@section('content')
<img src="{{ asset('/images/icon1.png') }}" >

<form action="/timeline" method="post">
    {{ csrf_field() }}
        <div style="background-color: #E8F4FA; text-align: center;">
            <input type="text" name="tweet" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="投稿内容を入力してください。">
            <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">ツイート</button>
        </div>
    </form>

@endsection