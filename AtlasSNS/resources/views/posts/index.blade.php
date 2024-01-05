@extends('layouts.login')

@section('content')
{{-- 投稿フォーム --}}
<div class="user-form-container">
    <?php $users = Auth::user(); ?>

    @if($users->images === 'images/icon1.png')
    {{-- デフォルトのアイコン --}}
    <img src="{{ asset($users->images) }}" alt="Default Avatar">
    @else
    {{-- プロフィール変更によるアイコン --}}
    <img src="/storage/{{ $users->images }}" alt="User Avatar">
    @endif

    {{ Form::open(['url' => '/tweet']) }}
    @csrf {{-- CSRF保護 --}}
    {{ Form::textarea('newPost', null, [
        'class' => 'form-control',
        'cols' => '150',
        'rows' => '10',
        'style' => 'white-space: pre-line;', // 改行対応のスタイルを追加
        'placeholder' => "投稿内容を入力してください。"
    ])}}
    <input type="image" src="{{ asset('images/post.png') }}" alt="投稿" class="custom-image-button">
    {{ Form::close() }}
</div>


{{-- 投稿フォーム終わり --}}

<div class="form-divider"></div>
    {{-- 呟き表示 --}}
    <div class="container">
        <div>
            <ul>
                @foreach ($list as $tweet)
                <li class="post-block">
                    <figure>
                    @if($tweet->user->images === 'images/icon1.png')
                    {{-- デフォルトのアイコン --}}
                    <img src="{{ asset($tweet->user->images) }}" alt="Default Avatar">
                    @else
                    {{-- プロフィール変更によるアイコン --}}
                    <img src="/storage/{{ $tweet->user->images }}" alt="User Avatar">
                    @endif
                </figure>
                    <div class="post-content">
                        <div>
                            <div class="post-name">{{ $tweet->user->username }} さん</div>
                            <div>{{ $tweet->created_at }}</div>
                        </div>
                        <div>{!! nl2br(e($tweet->post)) !!}</div>
                    </div>
                </li>
                <div class="post">
                    @if ($tweet->user_id === Auth::id())
                    <div class="icon-img">
                        <a class="js-modal-open" href="" post="{{ $tweet->post }}" post_id="{{ $tweet->id }}">
                            <div class="icon-box">
                                <img src="{{ asset('images/edit.png') }}" alt="Edit">
                            </div>
                        </a>
                        <a href="/post/{{$tweet->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                            <div class="icon-box-trash">
                            </div>
                        </a>
                    </div>
                @else
                    <div></div> {{-- 空のセル、整列のため --}}
                @endif
                </div>
                @endforeach
            </ul>
        </div>

        {{-- モーダル --}}
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                {{-- 編集フォーム --}}
                <form action="/update-form" method="POST">
                    <textarea name="upPost" class="modal_post"></textarea>
                    <input type="hidden" name="id" class="modal_id" value="">
                    <button type="submit" class="modal__edit">
                        <img src="{{ asset('images/edit.png') }}" alt="更新">
                    </button>
                    {{ csrf_field() }}
                </form>
                {{-- 編集フォーム終わり --}}
                {{-- <a class="js-modal-close" href="">閉じる</a> --}}
            </div>
        </div>
    </div>
    {{-- 呟き表示終わり --}}
@endsection





{{-- 元コード（念のため残す） --}}
{{-- <table class='table-hover'>
    @foreach ($list as $tweet)
        <tr>
            <td>
                <img src="/storage/{{$tweet->user->images}}" alt="User Icon">
            </td>
            <td>{{ $tweet->user->username }}</td>
            <td>{{ $tweet->post }}</td>
            <td>{{ $tweet->created_at }}</td>
            @if ($tweet->user_id === Auth::id())
            <td>
                <div class="actions">
                    <a class="js-modal-open" href="" post="{{ $tweet->post }}" post_id="{{ $tweet->id }}">
                        <div class="icon-box">
                            <img src="{{ asset('images/edit.png') }}" alt="Edit">
                        </div>
                    </a>
                    <a href="/post/{{$tweet->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
                        <div class="icon-box-trash">
                        </div>
                    </a>
                </div>
            </td>
            @else
                <td></td> 
            @endif
        </tr>
    @endforeach
</table> --}}