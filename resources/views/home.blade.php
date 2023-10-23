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

                @for($i = 0; $i<12; $i++)

                    <div class="product">
                        <img class="product__image" src=" {{ \Illuminate\Support\Facades\Vite::asset('resources/images/toy1.jpg') }}" alt="">
                        <p class="product__price">1 503 ₽</p>
                        <p class="product__name">Название товара</p>
                        <div class="product__rate">
                            @php($rating = rand(1,5))
                            @for($j = 1; $j<=5; $j++)
                                <span class="rating @if($j <= $rating) rating_active-star @endif "></span>
                            @endfor
                        </div>
                        <a href="#" class="product__button">В корзину</a>
                    </div>

                @endfor

            </div>
        </div>
    </div>

@endsection
