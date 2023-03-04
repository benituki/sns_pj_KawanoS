@extends('layouts.login')

@section('content')
<img src="{{ asset('/images/icon1.png') }}" >

{{ Form::open(['url' => '/tweet']) }}
@csrf
{{ csrf_field() }}

{{ Form::textarea('newPost', null, ['class' => 'form-control', 'cols' => '150', 'rows' => '10', 'placeholder' => "投稿内容を入力してください。"])}}
{{ Form::submit('投稿', ['class'=>'btn btn-primary btn-block']) }}

{{ Form::close() }}


{{-- <form action="/timeline" method="post">
    {{ csrf_field() }}
        <div>
            <input type="text" name="tweet" style="margin: 0%; padding: 0 1rem; width: 70%; border-radius: 6px; border: 0px solid #ccc; height: 10rem;" placeholder="投稿内容を入力してください。">
            <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">ツイート</button>
        </div>
    </form> --}}

@endsection