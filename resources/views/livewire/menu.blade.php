<div class="container">
    <div class="left">
        <div class="search">
            <div class="search__icon"></div>
            <p>@lang('Поиск')</p>
        </div>

        <nav class="nav">
            <ul>
                <li><a livewire:navigate href="{{ route('home') }}">@lang('Игрушки')</a></li>
                <li><a livewire:navigate href="#">@lang('О нас')</a></li>
                <li><a livewire:navigate href="#"><span class="shopping-cart-icon"></span> @lang('Корзина')</a></li>
            </ul>
        </nav>
    </div>

    <div class="login">
        @guest()
            <a livewire:navigate href="{{ route('login') }}">@lang('Вход')</a>
            <a livewire:navigate href="{{ route('register') }}">@lang('Регистрация')</a>
        @endguest
        @auth()
            <a style="cursor: pointer;" wire:click="logout">@lang('Выйти')</a>
        @endauth
    </div>
</div>
