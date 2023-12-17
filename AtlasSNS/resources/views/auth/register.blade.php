@extends('layouts.logout')

@section('content')

<div class="form-group">
    <h2>新規ユーザー登録</h2>

    {!! Form::open() !!}

    <div class="form-item">
        <span class="text-danger">{{$errors->first('username')}}</span>
        {{ Form::label('username', 'user name') }}
        {{ Form::text('username', null, ['class' => 'input']) }}
    </div>

    <div class="form-item">
        <span class="text-danger">{{$errors->first('mail')}}</span>
        {{ Form::label('mail', 'mail address') }}
        {{ Form::text('mail', null, ['class' => 'input']) }}
    </div>

    <div class="form-item">
        <span class="text-danger">{{$errors->first('password')}}</span>
        {{ Form::label('password', 'password') }}
        {{ Form::password('password', ['class' => 'input']) }}
    </div>

    <div class="form-item">
        <span class="text-danger">{{$errors->first('password-confirm')}}</span>
        {{ Form::label('password-confirm', 'password comfirm') }}
        {{ Form::password('password-confirm', ['class' => 'input']) }}
    </div>

    <div class="form-item">
        {{ Form::submit('REGISTER', ['class' => 'submit-button']) }}
    </div>

    {{ Form::open(['method' => 'POST'])}}

    <p><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
</div>

@endsection
