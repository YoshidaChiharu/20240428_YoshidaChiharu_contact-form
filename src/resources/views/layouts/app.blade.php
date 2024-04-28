<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <title>FashionablyLate</title>
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div></div>
            <div class="header__logo--outer">
                <a href="/" class="header__logo">
                    FashionablyLate
                </a>
            </div>
            <div class="header__button--outer">
                @yield('header-button')
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>