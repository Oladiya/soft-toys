<div class="row">
    <div class="sidebar">
        <div class="widget categories">
            <h3 class="categories__title @if($categoryInput === '') categories__title_active @endif"
                wire:click="allCategories">Мягкие игрушки</h3>
            <ul class="list">
                @foreach($categories as $category)
                    <li class="list__item categories__item @if($category === $categoryInput) list__item_active @endif">
                        <label>
                            <input name="categoryInput" wire:model.change="categoryInput" value="{{ $category }}"
                                   type="radio">{{ $category }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="widget filters">
            <div class="brands-filter">
                <div class="filters__header">
                    <div class="filters__title">@lang('Бренд')</div>
                    <div class="row">
                        @if($brandInputs !== [])
                            <div wire:click="allBrands" class="filters__clear">@lang('Очистить')</div>
                        @endif
                        @if($collapseBrands)
                            <div wire:click="$toggle('collapseBrands')" class="filters__expand"></div>
                        @else
                            <div wire:click="$toggle('collapseBrands')" class="filters__collapse"></div>
                        @endif
                    </div>
                </div>
                @unless($collapseBrands)
                    <ul class="list brands-filter__list">
                        @foreach($brands as $brand)
                            <li class="list__item brands-filter__item">
                                <label>
                                    <input name="brandInputs" wire:model.change="brandInputs" value="{{ $brand }}"
                                           type="checkbox">{{ $brand }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                @endunless
                <div class="br"></div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="grid">

            @foreach($products as $product)

                <div class="product">
                    <a href="#"><img class="product__image"
                                     src="{{ \Illuminate\Support\Facades\Storage::url($product->img_uri) }}" alt=""></a>
                    <p class="product__price">{{ $product->price }}</p>
                    <a href="#"><p class="product__name">{{ $product->name }}</p></a>
                    <div class="product__rate">
                        @php($rating = rand(1,5))
                        @for($j = 1; $j<=5; $j++)
                            <span class="rating @if($j <= $rating) rating_active-star @endif "></span>
                        @endfor
                    </div>
                    <a href="#" class="product__button">В корзину</a>
                </div>

            @endforeach

        </div>
    </div>
</div>
