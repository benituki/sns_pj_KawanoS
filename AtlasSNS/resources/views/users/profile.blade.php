@extends('layouts.login')
@section('content')
<div class="card w-50 mx-auto m-5">
    <div class="card-body">
        <div class="pt-2">
            <p class="h3 border-bottom border-secondary pb-3">
                @if(Auth::check() && Auth::user()->id == $user->id)
                    プロフィール編集
                @else

                @endif
            </p>
        </div>
        <div class="profile-edit">
            @if(Auth::check() && Auth::user()->id == $user->id)
            <img src="/storage/{{$user->images}}">
            {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT', "enctype" => "multipart/form-data"])!!}
            {!! Form::hidden('id', $user->id) !!}
            <div class="m-3">
                <div class="form-group pt-1">
                    {{Form::label('username', 'username')}}
                    {{Form::text('username', $user->username, ['class' => 'form-control', 'id' => 'username'])}}
                    <span class="text-danger">{{$errors->first('username')}}</span>
                </div>
                <div class="form-group pt-2">
                    {{Form::label('mail', 'mail')}}
                    {{Form::text('mail', $user->mail, ['class' => 'form-control', 'id' => 'mail'])}}
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
                    {{Form::text('bio', $user->bio, ['class' => 'form-control', 'id' => 'bio'])}}
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

        @else

        <div class="profile-detail">
            <img src="/storage/{{$user->images}}">
            <ul>
                <li>
                    <p>name</p>
                </li>
                <p>{{ $user->username }}</p>
                <li>
                    <p>bio</p>
                </li>
                <p> {{ $user->bio }}</p>
            </ul>

        </div>
    <div class="follow-btn">
         {{-- 下記追加（IF文） --}}
        @if(Auth::user()->isFollowing($user->id))
         {{-- フォロー解除ボタン --}}
        <form action="{{ route('un_follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit">フォロー解除</button>
        </form>
        @else
        {{-- フォローボタン --}}
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit">フォローする</button>
        </form>
        @endif
        {{-- 上記追加（IF分） --}}
    </div>

    <div class="line"></div>

    {{-- プロフィール詳細画面 --}}
    <div class="container">
        <div>
            @if ($user->posts->count() > 0)
                <ul>
                    @foreach ($user->posts as $tweet)
                        <li class="post-follow-block">
                            <figure>
                                <a href="{{ route('profile', [$tweet->user->id]) }}">
                                    <td><img src="/storage/{{ $tweet->user->images }}"></td>
                                </a>
                            </figure>
                            <div class="post-follow-content">
                                <div>
                                    <div class="post-name">{{ $tweet->user->username }}</div>
                                    <small>{{ $tweet->created_at }}</small>
                                </div>
                                <div>{{ $tweet->post }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @else
                <p>{{ $user->username }}さんはまだ何も呟いていません。</p>
                @endif
            </li>
            @endif
        </div>
    </div>


    </div>




</div>

@if($errors->any())
<script src="{{ asset('js/modal.js')}}"></script>
@endif

@endsection

