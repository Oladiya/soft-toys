<div class="orders">
    @foreach($orders as $orderKey => $order)
        <div class="cart-box">
            <div class="order-text-box row row_between">
                <div class="order-text">@lang('Заказ') № <span>{{$order->id}}</span></div>
                <div class="order-text">@lang('Статус'):
                    <span>
                        {{ $order->status }}
                    </span>
                </div>
            </div>
            <table class="cart-table">
                <thead class="cart-table__head">
                <tr>
                    <th class="cart-table__cell">@lang('Товар')</th>
                    <th class="cart-table__cell">@lang('Количество')</th>
                    <th class="cart-table__cell">@lang('Цена')</th>
                </tr>
                </thead>
                <tbody class="cart-table__body">
                @foreach($order->products as $product)
                    <tr class="cart-table__stroke">
                        <td class="cart-table__cell cart-table__cell_name">{{ $product->name }}</td>
                        <td class="cart-table__cell cart__change-count">{{ $product->count }}</td>
                        <td class="cart-table__cell">{{ $product->price }}</td>
                    </tr>
                @endforeach
                <tr class="cart-table__stroke">
                    <td class="cart-table__cell cart-table__cell_name">@lang('Итого')</td>
                    <td class="cart-table__cell cart__change-count">{{ $totalCounts[$orderKey] }}</td>
                    <td class="cart-table__cell">{{ $totalPrices[$orderKey] }}</td>
                </tr>
                </tbody>
            </table>
            <div class="order-text-box" style="text-align: left">
                <div class="order-text">
                    @lang('Адрес доставки'): <span>{{ $order->address }}</span>
                </div>
                <div class="order-text">
                    @lang('ФИО получателя'): <span>{{ $order->full_name }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
