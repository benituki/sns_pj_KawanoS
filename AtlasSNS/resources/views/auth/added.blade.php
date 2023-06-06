@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div id="clear">
  @if ($user)
  {{-- ↓$userからusernameを引っ張り出す --}}
  <p>{{ $user->username }}</p>
  @endif
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>



  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

{!! Form::close() !!}

@endsection
