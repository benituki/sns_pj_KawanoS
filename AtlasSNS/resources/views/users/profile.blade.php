@extends('layouts.login')

@section('content')
<h1>プロフィール</h1>
<form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">user name</label>
        <input type="text" name="name" id="username" value="{{ old('username', auth()->user()->username) }}">
    </div>

    <div class="form-group">
        <label for="email">mail adress</label>
        <input type="email" name="email" id="mail" value="{{ old('mail', auth()->user()->mail) }}">
    </div>

    <div class="form-group">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="form-group">
        <label for="password_confirmation">password comfirm</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <div class="form-group">
        <label for="bio">bio</label>
        <textarea name="bio" id="bio">{{ old('bio', auth()->user()->bio) }}</textarea>
    </div>

    <div class="form-group">
        <label for="images">icon image</label>
        <input type="file" name="images" id="images">
    </div>

    <button type="submit">更新</button>
</form>

@endsection