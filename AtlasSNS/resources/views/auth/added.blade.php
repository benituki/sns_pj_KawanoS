@extends('layouts.logout')

@section('content')

<div id="clear">

  {!! Form::open() !!}

  <div class="heading-container">
    @if ($user)
    {{-- ↓$userからusernameを引っ張り出す --}}
    <h3>{{ $user->username }}さん</h3>
    @endif
    <h3>ようこそAtlasSNSへ！</h3>
</div>
<p>ユーザー登録が完了しました。</p>
<p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>

  {!! Form::close() !!}
</div>



@endsection
