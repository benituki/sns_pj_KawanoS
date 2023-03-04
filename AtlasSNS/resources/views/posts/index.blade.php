@extends('layouts.login')

@section('content')
<img src="{{ asset('/images/icon1.png') }}" >
{{-- 投稿フォーム --}}
{{ Form::open(['url' => '/tweet']) }}
@csrf
{{ csrf_field() }}

{{ Form::textarea('newPost', null, ['class' => 'form-control', 'cols' => '150', 'rows' => '10', 'placeholder' => "投稿内容を入力してください。"])}}
{{ Form::submit('投稿', ['class'=>'btn btn-primary btn-block']) }}


{{ Form::close() }}

{{-- 呟き表示 --}}
{{ Form::open(['url' => '/update-form'])}}

{{ FOrm::button('更新',['type' => 'submit', 'class' => 'btn btn-outline-success btn-lg']) }}
{{ Form::close() }}


@endsection