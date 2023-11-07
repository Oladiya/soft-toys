<div class="content">
    <div class="grid">

        @foreach($products as $product)

            <div wire:key="{{ $product->id }}" class="product">
                <a href="{{ route('products.show', $product->id) }}"><img class="product__image" src=" {{ Storage::url($product->img_uri) }}" alt=""></a>
                <p class="product__price">{{ $product->price }}</p>
                <a href="{{ route('products.show', $product->id) }}"><p class="product__name">{{ $product->name }}</p></a>
                <div class="product__rate">
                    @php($rating = rand(1,5))
                    @for($j = 1; $j<=5; $j++)
                        <span class="rating @if($j <= $rating) rating_active-star @endif "></span>
                    @endfor
                </div>
                <button
                    type="button"
                    wire:click="delete({{ $product->id }})"
                    wire:confirm="Are you sure you want to delete this post?"
                    class="product__admin-button product__admin-button_delete">
                    @lang('Удалить')
                </button>

                <button
                    type="button"
                    wire:click="edit({{ $product->id }})"
                    class="product__admin-button product__admin-button_redact">
                    @lang('Редактировать')
                </button>
                <a class="product__button" href="{{ route('products.show', $product->id) }}">@lang('Посмотреть')</a>
            </div>

        @endforeach

    </div>
</div>
