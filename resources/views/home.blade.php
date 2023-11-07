@extends('layouts.main')

@section('content')

    <div class="row">
        <div class="sidebar">
            <div class="widget categories">
                <h3>Мягкие игрушки</h3>
                <ul class="list">
                    <li class="list__item list__item_active">Игрушки интерактивные мягкие</li>
                    <li class="list__item">Мягкие игрушки по размерам</li>
                    <li class="list__item">Персонажи мультфильмов мягкие</li>
                    <li class="list__item">Мягкие аксессуары</li>
                    <li class="list__item">Кукольный театр</li>
                </ul>
            </div>
            <div class="widget filters">
                Фильтры
            </div>
        </div>

        <div class="content">
            <div class="grid">

                @foreach($products as $product)

                    <div class="product">
                        <a href="#"><img class="product__image" src="{{ \Illuminate\Support\Facades\Storage::url($product->img_uri) }}" alt=""></a>
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

@endsection
