<!doctype html>
<html class="page" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/scss/app.scss'])
</head>
<body class="page__body" >

        <header class="header">
            <div class="container">
                <div class="search">
                    <div class="search__icon"></div><p>@lang('Поиск')</p>
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="#">@lang('Игрушки')</a></li>
                        <li><a href="#">@lang('О нас')</a></li>
                        <li><a href="#"><span class="shopping-cart-icon"></span> @lang('Корзина')</a></li>
                    </ul>
                </nav>
                <div class="login">
                    <a href="#">@lang('Вход')</a>
                    <a href="#">@lang('Регистрация')</a>
                </div>
            </div>
        </header>

        <main class="main">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">

            </div>
        </footer>

</body>
</html>
