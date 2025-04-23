<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>FashionablyLate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 共通CSSの読み込み -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">

    @yield('head')
</head>

<body>
    <header class="main-header">
        <div class="main-header-inner">
            <h1 class="main-logo">FashionablyLate</h1>

            <div class="main-nav">
                @auth
                <!-- 現在のページが index.blade.php（route('index')）のときは「管理画面」へ -->
                @if (request()->routeIs('index'))
                <a href="{{ route('contact.admin') }}" class="auth-button">管理画面</a>
                @else
                <a href="{{ route('index') }}" class="auth-button">お問い合わせフォーム</a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="auth-button">Logout</button>
                </form>
                @endauth

                @guest
                <!-- 未ログインユーザー向け -->
                <a href="{{ route('login') }}" class="auth-button">Login</a>
                <a href="{{ route('register') }}" class="auth-button">Register</a>
                @endguest
            </div>
        </div>
    </header>


    <main class="content">
        @yield('content')
    </main>
</body>

</html>