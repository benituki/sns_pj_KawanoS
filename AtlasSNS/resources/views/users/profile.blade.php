@extends('layouts.login')
@section('content')
<div class="card w-50 mx-auto m-5">
    <div class="card-body">
        <div class="pt-2">
            <p class="h3 border-bottom border-secondary pb-3">プロフィール編集</p>
        </div>
        <img src="/storage/{{$users->images}}">
        {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT', "enctype" => "multipart/form-data"])!!}
        {!! Form::hidden('id', $users->id) !!}
        <div class="m-3">
            <div class="form-group pt-1">
                {{Form::label('username', 'username')}}
                {{Form::text('username', $users->username, ['class' => 'form-control', 'id' => 'username'])}}
                <span class="text-danger">{{$errors->first('username')}}</span>
            </div>
            <div class="form-group pt-2">
                {{Form::label('mail', 'mail')}}
                {{Form::text('mail', $users->mail, ['class' => 'form-control', 'id' => 'mail'])}}
                <span class="text-danger">{{$errors->first('mail')}}</span>
            </div>
            <div class="form-group pt-2">
                {{Form::label('password', 'password')}}
                {{Form::password('password', ['class' => 'form-control', 'id' => 'password'])}}
                <span class="text-danger">{{$errors->first('password')}}</span>
            </div>
            <div class="form-group pt-1">
                {{Form::label('password-confirm', 'password confirm')}}
                {{Form::password('password-confirm', ['class' => 'form-control', 'id' => 'password-confirm'])}}
                <span class="text-danger">{{$errors->first('password-confirm')}}</span>
            </div>
            <div class="form-group pt-3">
                {{Form::label('bio', 'bio')}}
                {{Form::text('bio', $users->bio, ['class' => 'form-control', 'id' => 'bio'])}}
                <span class="text-danger">{{$errors->first('bio')}}</span>
            </div>
            <div class="form-group pt-3" >
                {{Form::label('images', 'icon image')}}
                {{Form::file('images', ['class' => 'form-control', 'id' => 'images'])}}
                <span class="text-danger">{{$errors->first('images')}}</span>
            </div>
            <div class="form-group pull-right">
                {{Form::submit('更新する', ['class'=>'btn btn-success rounded-pill'])}}
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>


@if($errors->any())
<script src="{{ asset('js/modal.js')}}"></script>
@endif

@endsection