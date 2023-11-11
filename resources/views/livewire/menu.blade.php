<div>
    <div class="container">
        <div class="left">
            <button wire:click="$toggle('searchOn')" class="search-button">
                <div class="search__icon"></div>
                <p>@lang('Поиск')</p>
            </button>

            <nav class="nav">
                <ul>
                    <li><a livewire:navigate href="{{ route('home') }}">@lang('Игрушки')</a></li>
                    <li><a livewire:navigate href="#">@lang('О нас')</a></li>
                    <li><a livewire:navigate href="{{ route('cart') }}"><span class="shopping-cart-icon"></span> @lang('Корзина') @if($cartCount > 0) <span class="cart-count">({{ $cartCount }})</span> @endif</a></li>
                </ul>
            </nav>
        </div>

        <div class="login">
            @guest()
                <a livewire:navigate href="{{ route('login') }}">@lang('Вход')</a>
                <a livewire:navigate href="{{ route('register') }}">@lang('Регистрация')</a>
            @endguest
            @auth()
                @if(Auth::user()->role->name === 'admin')
                    <a wire:navigate href="{{ route('products.index') }}">@lang('Админ <br> Панель')</a>
                @endif
                <a style="cursor: pointer;" wire:click="logout">@lang('Выйти')</a>
            @endauth
        </div>
    </div>
    @if($searchOn)
        <div class="search">
            <input wire:model.live.debounce.150ms="search" placeholder="@lang('Поиск по игрушкам...')" type="text">
            <ul class="search__list">
                @foreach($products as $product)
                    <li wire:click="showProduct({{ $product->id }})">{{ $product->name }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
