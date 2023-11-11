<div class="cart">
    @if($products !== [])
        <div class="cart-box">
            <table class="cart-table">
                <thead class="cart-table__head">
                <tr>
                    <th class="cart-table__cell">@lang('Товар')</th>
                    <th class="cart-table__cell">@lang('Количество')</th>
                </tr>
                </thead>
                <tbody class="cart-table__body">
                @foreach($products as $product)
                    <tr class="cart-table__stroke">
                        <td class="cart-table__cell">{{ $product->name }}</td>
                        <td class="cart-table__cell cart__change-count">
                            <button class="cart__change-count__button" wire:click="subtractProduct({{ $product->id }})">-</button>
                            <div>{{ $product->count }}</div>
                            <button class="cart__change-count__button" wire:click="addProduct({{ $product->id }})">+
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button wire:navigate href="#">@lang('Перейти к оформлению заказа')</button>
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
