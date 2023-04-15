@extends('layouts.login')

@section('content')
<img src="{{ asset('/images/icon1.png') }}" >
{{-- 投稿フォーム --}}
{{ Form::open(['url' => '/tweet']) }}
@csrf
{{ csrf_field() }}

{{ Form::textarea('newPost', null, ['class' => 'form-control', 'cols' => '150', 'rows' => '10', 'placeholder' => "投稿内容を入力してください。"])}}
{{ Form::submit('投稿', ['class'=>'btn btn-primary btn-block']) }}


{{ Form::close() }}

{{-- 呟き表示 --}}
<div class="container">
    <table class='table table-hover'>
        @foreach ($list as $list)
        <tr>
            <td>{{ $list->user->username }}</td>
            <td>{{ $list->post }}</td>
            <td>{{ $list->created_at }}</td>
            {{-- 投稿の編集button --}}
            <div class="content">
                <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}">編集</a>
                <a class="btn btn-danger" href="" post="{{ $list->post }}" post_id="{{ $list->id }}" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">削除</a>
            </div>
            {{-- {{ FOrm::button('更新',['type' => 'submit', 'class' => 'js-modal-open']) }} --}}
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