<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
        @vite('resources/scss/app.scss')
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
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="container">

        </div>
    </footer>
    </body>
</html>
