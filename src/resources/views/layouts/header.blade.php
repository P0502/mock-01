<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}" />
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="haeder-inner">
            <h1 class="header-logo">
                <img src="{{ asset('images/COACHTECHヘッダーロゴ.png') }}" alt="logo" class="header-logo-image">
            </h1>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>