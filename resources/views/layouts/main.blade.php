<!doctype html>
<html class="page" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/scss/app.scss'])
    @livewireStyles
</head>
<body class="page__body" >

        <header class="header">
            @livewire('menu')
        </header>

        <main class="main">
            @yield('content')
        </main>

        <footer class="footer">
            <div class="container">

            </div>
        </footer>
    @livewireScripts
</body>
</html>
