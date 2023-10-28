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
    <x-menu />
</header>

<div class="admin-block row">

    <a href="{{ route('products.index') }}" class="admin-block__button">@lang('Список товаров')</a>
    <a href="{{ route('products.create') }}" class="admin-block__button">@lang('Добавить товар')</a>

</div>

<main class="main">
    @yield('content')
</main>

<footer class="footer">
    <div class="container">

    </div>
</footer>

</body>
</html>
