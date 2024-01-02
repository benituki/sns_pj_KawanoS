@extends('layouts.login')
@section('content')

<div class="card">
    <div class="pt-2">
        <p class="profile_if">
            @if(Auth::check() && Auth::user()->id == $user->id)

            @else

            @endif
        </p>
    </div>
    <div class="profile">
        @if(Auth::check() && Auth::user()->id == $user->id)
        <div class="profile_edit_group">
            
            @if($user->images === 'images/icon1.png')
            {{-- デフォルトのアイコン --}}
            <img src="{{ asset($user->images) }}" alt="Default Avatar">
            @else
            {{-- プロフィール変更によるアイコン --}}
            <img src="/storage/{{ $user->images }}" alt="User Avatar">
            @endif

            {!! Form::open(['route' => ['profile_edit'], 'method' => 'PUT', "enctype" => "multipart/form-data"])!!}
            {!! Form::hidden('id', $user->id) !!}
            <div class="profile_edit">
                <div class="form-container">
                    <div class="form-group">
                        {{Form::label('username', 'user name')}}
                        {{Form::text('username', $user->username, ['class' => 'form-control', 'id' => 'username'])}}
                        <span class="text-danger">{{$errors->first('username')}}</span>
                </div>
                <div class="form-container">
                    <div class="form-group">
                        {{Form::label('bio', 'bio')}}
                        {{Form::text('bio', $user->bio, ['class' => 'form-control', 'id' => 'bio'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('username')}}</span>
                </div>
                <div class="form-container">
                    <div class="form-group">
                        {{Form::label('mail', 'adress mail')}}
                        {{Form::text('mail', $user->mail, ['class' => 'form-control', 'id' => 'mail'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('mail')}}</span>
                </div>
                <div class="form-container">
                    <div class="form-group">
                        {{Form::label('password', 'password')}}
                        {{Form::password('password', ['class' => 'form-control', 'id' => 'password'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('password')}}</span>
                </div>
                <div class="form-container">
                    <div class="form-group">
                        {{Form::label('password-confirm', 'password confirm')}}
                        {{Form::password('password-confirm', ['class' => 'form-control', 'id' => 'password-confirm'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('password-confirm')}}</span>
                </div>
                <div class="form-container">
                    <div class="form-group">
                        {{Form::label('bio', 'bio')}}
                        {{Form::text('bio', $user->bio, ['class' => 'form-control', 'id' => 'bio'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('bio')}}</span>
                    </div>
                </div>
                <div class="form-container">
                    <div class="form-group_img" >
                        {{Form::label('images', 'icon image')}}
                        {{Form::file('images', ['class' => 'form-control', 'id' => 'images'])}}
                    </div>
                    <span class="text-danger">{{$errors->first('images')}}</span>
                </div>
            </div>
        <div class="form-btn">
            {{Form::submit('更新', ['class'=>'form-btn'])}}
        </div>
        {!!Form::close()!!}
        </div>

        @else

        <div class="profiles">
            <div class="profile_detail">
                <img src="/storage/{{$user->images}}">
                <ul>
                    <div class="profile_name">
                        <li>
                            <h1>name</h1>
                            <p>{{ $user->username }}</p>
                        </li>
                    </div>
                    <div class="profile_bio">
                        <li>
                            <h1>bio</h1>
                            <p>{{ $user->bio }}</p>
                        </li>
                    </div>
                </ul>
                <div class="follow-btn">
                    {{-- 下記追加（IF文） --}}
                    @if(Auth::user()->isFollowing($user->id))
                    {{-- フォロー解除ボタン --}}
                    <form action="{{ route('un_follow', ['id' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="unfollow-btn">フォロー解除</button>
                    </form>
                    @else
                    {{-- フォローボタン --}}
                    <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="newfollow-btn">フォローする</button>
                    </form>
                    @endif
                    {{-- 上記追加（IF分） --}}
                </div>
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
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@if($errors->any())
<script src="{{ asset('js/modal.js')}}"></script>
@endif

@endsection

