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
        @livewire('menu')
    </header>
    @auth()
        @if(Auth::user()->role->name === 'admin')
            @livewire('admin-block')
        @endif
    @endauth

    <main class="main">
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="container">

        </div>
    </footer>
    </body>
</html>
