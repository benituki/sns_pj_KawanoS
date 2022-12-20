@extends('layouts.logout')

@section('content')


{!! Form::open() !!}

<div id="clear">
  {{-- <p>marumaruさん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p> --}}

 

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

{!! Form::close() !!}

@endsection