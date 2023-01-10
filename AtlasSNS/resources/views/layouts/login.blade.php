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
        <div id = "head">
            {{-- //イメージ画像ヘッダーロゴトップリンク遷移 --}}
        <h1><a href="top"><img src="{{ asset('/images/atlas.png') }}" ></a></h1>
            <div id="top">
                <div id="top">
                    <p>{{ Session::get('$username') }}さん<img src="{{ asset('/images/icon1.png') }}" ></p>
                    {{-- //アコーディオンメニュー（2022/12/30）開始 --}}
                    
                    <div class="accordion">
                        <input type="checkbox" id="accordion1" class="checkbox">
                         <dl>
                           <dt><label for="accordion1"></label></dt>
                           <dd>
                            <div>
                                <ul>
                                    <li><a href="/top">ホーム</a></li>
                                    <li><a href="/profile">プロフィール</a></li>
                                    <li><a href="/logout">ログアウト</a></li>
                                </ul>
                            </div>
                           </dd>
                         </dl>
                       </div>
                      {{-- //アコーディオンメニュー終わり --}}

                      {{-- //アコーディオンメニュー（2022/12/30）開始 --}}
                {{-- <div>
                        <ul>
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                </div> --}}
                {{-- //アコーディオンメニュー終わり --}}

            </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    {{-- jQueryとつなげる（2022/12/30） --}}
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
