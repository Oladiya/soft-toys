<div class="cart">
        <form wire:submit.prevent="save" class="form cart-box">
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
                        <td class="cart-table__cell cart-table__cell_name">{{ $product['name'] }}</td>
                        <td class="cart-table__cell cart__change-count">
                            <div>{{ $product['count'] }}</div>
                        </td>
                        <td class="cart-table__cell">{{ $product['price'] * $product['count'] }}</td>
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

            <x-input-text name="address" label="Адрес" wire:model="address" />

            <x-input-text name="full_name" label="Фамилия Имя Отчество" wire:model="full_name" />

            <input class="form__button" type="submit" value="@lang('Заказать')">
        </form>

</div>

