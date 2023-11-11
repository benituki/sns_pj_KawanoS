@extends('layouts.login')

@section('content')
<h1>検索</h1>

<form method="GET" action="{{ route('posts.index')}}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset( $search )) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('posts.index') }}" class="text-white">
            クリア
            </a>
        </button>
    </div>
</form>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <!-- ユーザー一覧の表示とフォローボタン -->
    @foreach($users as $users)
    <div>
         {{-- 下記追加（IF文） --}}
        <div>{{ $users->username }}</div>
        <img src="/storage/{{$users->images}}" alt="User Icon">
        @if(Auth::user()->isFollowing($users->id))
         {{-- @if($search) と @else：Bladeテンプレート内の条件文を表します。$search という変数の値を評価し、その値に応じて表示するコンテンツを切り替えます。$search が真（true）の場合、@if ブロック内のコードが実行され、それ以外の場合は @else ブロック内のコードが実行されます。 --}}
         {{-- フォロー解除ボタン --}}
        <form action="{{ route('un_follow', ['id' => $users->id]) }}" method="POST">
            {{-- <form> 要素：HTMLフォームを定義しています。フォームはユーザーがデータを送信するためのコンテナです。 --}}
                {{-- action="{{ route('un_follow', ['id' => $users->id]) }}"：フォームが送信されたときに実行されるアクションを指定しています。route ヘルパーを使用して、特定のルート（un_follow ルート）にアクセスするためのURLを生成しています。['id' => $users->id] はルートに渡されるパラメーターを指定しており、$users->id の値が id パラメーターとしてルートに渡されます。 --}}
                {{-- method="POST"：フォームデータを送信するHTTPメソッドを指定しています。この場合、データはHTTP POST メソッドを使用して送信されます。 --}}
            {{ csrf_field() }}
            {{-- @csrf：Cross-Site Request Forgery（CSRF）攻撃からの保護を提供するためのBladeディレクティブです。これにより、フォームから送信されたデータが正当なものであることが確認されます。 --}}
            <button type="submit">フォロー解除</button>
            {{-- <button type="submit">フォロー解除</button>：フォロー解除ボタンまたはフォローボタンです。ユーザーはこのボタンをクリックしてフォロー解除またはフォローを実行します。 --}}
        </form>
        @else
        {{-- フォローボタン --}}
        <form action="{{ route('follow', ['id' => $users->id]) }}" method="POST">
            {{ csrf_field() }}
            <button type="submit">フォローする</button>
        </form>
        @endif
        {{-- 上記追加（IF分） --}}
    </div>
    @endforeach

  </body>

@endsection