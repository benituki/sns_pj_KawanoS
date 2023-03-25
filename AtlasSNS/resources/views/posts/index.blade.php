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

{{ Form::open(['url' => '/update-form'])}}
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
            </div>
            {{ FOrm::button('更新',['type' => 'submit', 'class' => 'btn btn-outline-success btn-lg']) }}
        </tr>
        @endforeach
    </table>
    {{-- モーダル --}}
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
            </form>
            <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

    
</div>
{{ Form::close() }}


@endsection