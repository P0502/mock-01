<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <h1 class="header-logo">
            <img src="{{ asset('images/COACHTECHヘッダーロゴ.png') }}" alt="logo" class="header-logo-image">
        </h1>
            <form class="item-search-form" action="/" method="get">
                <input class="item-search-input" type="search" name="search" id="search" placeholder="なにをお探しですか?" value="{{ $keyword ?? request('search') }}">
                <input type="hidden" name="tab" value="{{ request('tab', 'recommend') }}">
            </form>
            <div class="header-buttons">
                @auth
                <form class="logout-form" action="/logout" method="post">
                    @csrf
                    <button class="logout-button" type="submit">ログアウト</button>
                </form>
                @endauth
                @guest
                <a href="/login" class="login-button">ログイン</a>
                @endguest
                <a class="mypage-button" href="/mypage">マイページ</a>
                <button class="sell-button" type="button" onclick="location.href='/sell'">出品</button>
            </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>