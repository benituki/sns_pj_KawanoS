@extends('layouts.login')

@section('content')
<?php $users = Auth::user(); ?><img src="/storage/{{$users->images}}">

{{-- 投稿フォーム --}}
{{ Form::open(['url' => '/tweet']) }}
@csrf {{-- {{ csrf_field() }} --}}

{{ Form::textarea('newPost', null, ['class' => 'form-control', 'cols' => '150', 'rows' => '10', 'placeholder' => "投稿内容を入力してください。"])}}
{{ Form::submit('投稿', ['class'=>'btn btn-primary btn-block']) }}

{{ Form::close() }}

{{-- 呟き表示 --}}
<div class="container">
    <table class='table table-hover'>
        @foreach ($list as $list)
        <tr>
            <td>
                <img src="/storage/{{$list->user->images}}" alt="User Icon">
            </td>
            {{-- 下記メモ　$listにあるのはPostモデル。Userモデルとリレーションされているため一度userを入力することによってPostモデルにないusernameを表示することができる。 --}}
            <td>{{ $list->user->username }}</td>
            <td>{{ $list->post }}</td>
            <td>{{ $list->created_at }}</td>
            {{-- 投稿の編集button --}}
            @if ($list->user_id === Auth::id())
            {{-- 自分のtweetのみ、変更可能にする --}}
            <div class="content">
                <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="{{ asset('images/edit.png') }}"></a>
                <a href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="{{ asset('images/trash-h.png') }}"></a>
            </div>
            @endif
        </tr>
        @endforeach
    </table>
    {{-- モーダル --}}
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            {{-- フォームタグ --}}
            {{-- method->方法，方式；筋道，秩序 --}}
            <form action="/update-form" method="POST">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
            </form>
            {{-- フォーム終わり --}}
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
</div>

@endsection