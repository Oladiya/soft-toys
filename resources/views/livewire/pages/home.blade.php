<div class="row">
    <div class="sidebar">
        <div class="widget categories">
            <h3 class="categories__title @if($categoryInput === '') categories__title_active @endif"
                wire:click="clearCategories">Мягкие игрушки</h3>
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

        <div class="widget">

            <div class="filter">
                <div class="filter__header">
                    <div class="filter__title">@lang('Цена') ₽</div>
                    <div class="row row_center">
                        @if($priceMinInput !== '' or $priceMaxInput !== '')
                            <div wire:click="clearPrices" class="filter__clear">@lang('Очистить')</div>
                        @endif
                        @if($collapsePrice)
                            <div wire:click="$toggle('collapsePrice')" class="filter__expand"></div>
                        @else
                            <div wire:click="$toggle('collapsePrice')" class="filter__collapse"></div>
                        @endif
                    </div>
                </div>
                @unless($collapsePrice)
                    <div class="filter__body price__box">
                        <input class="price__input" wire:model.live.debounce.150ms="priceMinInput"
                               placeholder="{{ $priceMin }}" type="text">
                        <input class="price__input" wire:model.live.debounce.150ms="priceMaxInput"
                               placeholder="{{ $priceMax }}" type="text">
                    </div>
                @endunless
            </div>

            <div class="br"></div>

            <x-filter :input="$brandInputs"
                      inputName="brandInputs"
                      clearFunction="clearBrands"
                      :collapse="$collapseBrands"
                      collapseFunction="collapseBrands"
                      :items="$brands"
                      title="Бренд"/>

            <div class="br"></div>

            <x-filter :input="$viewInputs"
                      inputName="viewInputs"
                      clearFunction="clearViews"
                      :collapse="$collapseViews"
                      collapseFunction="collapseViews"
                      :items="$views"
                      title="Вид"/>

            <div class="br"></div>

            <x-filter :input="$typeInputs"
                      inputName="typeInputs"
                      clearFunction="clearTypes"
                      :collapse="$collapseTypes"
                      collapseFunction="collapseTypes"
                      :items="$types"
                      title="Тип"/>

            <div class="br"></div>

            <x-filter :input="$designAndConstructionInputs"
                      inputName="designAndConstructionInputs"
                      clearFunction="clearDesignAndConstructions"
                      :collapse="$collapseDesignAndConstructions"
                      collapseFunction="collapseDesignAndConstructions"
                      :items="$designAndConstructions"
                      title="Дизайн и конструкция"/>

            <div class="br"></div>

            <x-filter :input="$sizeInputs"
                      inputName="sizeInputs"
                      clearFunction="clearSizes"
                      :collapse="$collapseSizes"
                      collapseFunction="collapseSizes"
                      :items="$sizes"
                      title="Размер"/>

            <div class="br"></div>

            <div class="center">
                <button wire:click="clearAll" class="widget__button">@lang('Очистить всё')</button>
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
                    <button
                        wire:click="addToCart({{ $product->id }})"
                        class="product__button">
                        В корзину
                    </button>
                </div>

            @endforeach

        </div>
    </div>
</div>
