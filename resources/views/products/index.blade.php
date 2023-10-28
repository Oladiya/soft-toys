@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="grid">

            @foreach($products as $product)

                <div class="product">
                    <img class="product__image" src=" {{ Storage::url($product->img_uri) }}" alt="">
                    <p class="product__price">{{ $product->price }}</p>
                    <p class="product__name">{{ $product->name }}</p>
                    <div class="product__rate">
                        @php($rating = rand(1,5))
                        @for($j = 1; $j<=5; $j++)
                            <span class="rating @if($j <= $rating) rating_active-star @endif "></span>
                        @endfor
                    </div>
                    <form method="post" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="product__admin-button product__admin-button_delete" type="submit">@lang('Удалить')</button>
                    </form>

                    <a class="product__admin-button product__admin-button_redact" href="{{ route('products.edit', $product->id) }}">@lang('Редактировать')</a>
                    <a class="product__button" href="#">@lang('Посмотреть')</a>
                </div>

            @endforeach

        </div>
    </div>

@endsection
