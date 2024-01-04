{{-- @extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<p>AtlasSNSへようこそ</p>

{{ Form::label('Mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('ログイン') }}

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection --}}

@extends('layouts.logout')

@section('content')
<div class="form-group">
        
    {!! Form::open() !!}
    
    <p>AtlasSNSへようこそ</p>
    
    <div class="form-item">
        {{ Form::label('mail', 'mail address') }}
        {{ Form::text('mail', null, ['class' => 'input']) }}
    </div>

    <div class="form-item">
        {{ Form::label('password', 'password') }}
        {{ Form::password('password', ['class' => 'input']) }}
    </div>

    <div class="form-item">
        {{ Form::submit('LOGIN', ['class' => 'submit-button']) }}
    </div>
    
    <p><a href="/register">新規ユーザーの方はこちら</a></p>
    {!! Form::close() !!}
</div>
@endsection
