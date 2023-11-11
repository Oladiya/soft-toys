<div class="cart">
    @if($products !== [])
        <div class="cart-box">
            <table class="cart-table">
                <thead class="cart-table__head">
                <tr>
                    <th class="cart-table__cell">@lang('Товар')</th>
                    <th class="cart-table__cell">@lang('Количество')</th>
                    <th class="cart-table__cell">@lang('Цена')</th>
                </tr>
                </thead>
                <tbody class="cart-table__body">
                @foreach($products as $product)
                    <tr class="cart-table__stroke">
                        <td class="cart-table__cell cart-table__cell_name">{{ $product->name }}</td>
                        <td class="cart-table__cell cart__change-count">
                            <button class="cart__change-count__button" wire:click="subtractProduct({{ $product->id }})">-</button><div>{{ $product->count }}</div><button class="cart__change-count__button" wire:click="addProduct({{ $product->id }})">+</button>
                        </td>
                        <td class="cart-table__cell">{{ $product->price * $product->count }}</td>
                    </tr>
                @endforeach
                <tr class="cart-table__stroke">
                    <td class="cart-table__cell cart-table__cell_name">@lang('Итого')</td>
                    <td class="cart-table__cell cart__change-count">
                        <div>{{ $totalCount }}</div>
                    </td>
                    <td class="cart-table__cell">{{ $totalPrice }}</td>
                </tr>
                </tbody>
            </table>
            <button
                wire:click="createOrder"
                @guest
                wire:confirm="Для оформления заказа нужно аутентифицироваться.\nХотите войти?">
                @endguest
                @lang('Перейти к оформлению заказа')
            </button>
            <button wire:click="clearCart">@lang('Очистить корзину')</button>
        </div>
    @else
        <div class="empty-cart">
            <div class="empty-cart__text"><span class="shopping-cart-icon"></span> @lang('Корзина пуста!')</div>
            <button wire:navigate href="{{ route('home') }}"
                    class="empty-cart__button">@lang('Перейти к покупкам')</button>
        </div>
    @endif
</div>
