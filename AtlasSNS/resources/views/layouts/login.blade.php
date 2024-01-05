<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="<img src='/public/images/icon1.png'>" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div class="header-wrap">
            <div id="head">
                {{-- //イメージ画像ヘッダーロゴトップリンク遷移 --}}
                <h1><a href="/top"><img src="{{ asset('/images/atlas.png') }}" ></a></h1>
            </div>
            <div id="users">
                <div>
                    <ul class="menu">
                        <li>
                            <a href=""><?php $users = Auth::user(); ?>{{ $users->username }} さん</a>
                            <ul>
                                <li><a href="/top">HOME</a></li>
                                {{-- <li><a href="/profile">プロフィール編集</a></li> --}}
                                <li><a class="dropdown-item" href="{{route('profile')}}"><span class="text-primary">プロフィール編集</span></a></li>
                                <li><a href="/logout">ログアウト</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="usericon">
                    @if($users->images === 'images/icon1.png')
                    {{-- デフォルトのアイコン --}}
                    <img src="{{ asset($users->images) }}" alt="Default Avatar">
                    @else
                    {{-- プロフィール変更によるアイコン --}}
                    <img src="/storage/{{ $users->images }}" alt="User Avatar">
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p>
                <div>
                <p>フォロー数 {{ Auth::user()->following->count() }}名</p>
                {{-- 現在ログインしているユーザーを認証ー＞ログインしているユーザーの ’following’リレーションを呼び出しー＞リストの要素数を数える。つまりカウントである。--}}
                </div>
                <a href="{{ asset('/follow-list') }}" class="btn">フォローリスト</a>
                <div>
                <p>フォロワー数 {{ Auth::user()->followers->count() }}名</p>
                </div>
                <a href="{{ asset('/follower-list') }}" class="btn">フォロワーリスト</a>
            </div>
            <a href="{{ asset('/search') }}" class="btn-search">ユーザー検索</a>
        </div>
    </div>
    <footer>
    </footer>
    {{-- jQueryとつなげる（2022/12/30） --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
