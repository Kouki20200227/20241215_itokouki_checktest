<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check_Test</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('link')
</head>
<body>
    <header>
        <div class="header__title">
            <h1 class="logo__title">FashionablyLate</h1>
            <nav class="ttl__btn">
                @yield('title_button')
            </nav>
        </div>
    </header>
    <main>
    <h2 class="sub__title">@yield('sub_title')</h2>
    @yield('content')
    </main>
</body>
</html>