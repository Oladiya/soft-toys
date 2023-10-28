@extends('layouts.admin')

@section('content')

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form">

        @csrf

        <h1 class="form__title">@lang('Добавить новый продукт')</h1>

        <div class="form__item">
            <label for="name">@lang('Название')</label>
            <input value="{{ old('name') }}" id="name" name="name" type="text">

            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__item">
            <label for="category">@lang('Категория')</label>
            <input value="{{ old('category') }}" id="category" name="category" type="text">

            @error('category')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__item">
            <label for="description">@lang('Описание')</label>
            <textarea  id="description" name="description" type="text">{{ old('description') }}</textarea>

            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__container">

            <div class="form__item form__item_small">
                <label for="brand">@lang('Бренд')</label>
                <input value="{{ old('brand') }}" id="brand" name="brand" type="text">

                @error('brand')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__item form__item_small">
                <label for="price">@lang('Цена')</label>
                <input value="{{ old('price') }}" id="price" name="price" type="text">

                @error('price')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__item">
                <label for="size">@lang('Размер')</label>

                <select name="size" id="size">
                    <option value="small">@lang('маленькие')</option>
                    <option value="medium">@lang('средние')</option>
                    <option value="large">@lang('большие')</option>
                </select>

                @error('size')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>


        </div>

        <div class="form__container">
            <div class="form__item form__item_medium">
                <label for="view">@lang('Вид')</label>
                <input value="{{ old('view') }}" id="view" name="view" type="text">

                @error('view')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form__item form__item_medium">
                <label for="type">@lang('Тип')</label>
                <input value="{{ old('type') }}" id="type" name="type" type="text">

                @error('type')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

       <div class="form__container">
           <div class="form__item form__item_medium">
               <label for="design_and_construction">@lang('Дизайн и конструкция')</label>
               <input value="{{ old('design_and_construction') }}" id="design_and_construction" name="design_and_construction" type="text">

               @error('design_and_construction')
               <p class="error-message">{{ $message }}</p>
               @enderror
           </div>

           <div class="form__item form__item_medium">
               <label for="image">@lang('Изображение')</label>
               <input value="{{ old('image') }}" id="image" name="image" type="file">

               @error('image')
               <p class="error-message">{{ $message }}</p>
               @enderror
           </div>
       </div>

        <input class="form__button" type="submit" value="@lang('Добавить')">

    </form>

@endsection
