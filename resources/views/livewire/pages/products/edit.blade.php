<div>

    <form
        wire:submit.prevent="update"
        enctype="multipart/form-data" class="form">

        <h1 class="form__title">@lang('Добавить новый продукт')</h1>

        <x-input-text name="name" label="Название" :value="$name" wire:model="name" />

        <x-input-text name="category" label="Категория" :value="$category" wire:model="category" />

        <div class="form__item">
            <label for="description">@lang('Описание')</label>
            <textarea wire:model="description" id="description" type="text"></textarea>

            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__container">

            <x-input-text name="brand" class="form__item_small" label="Бренд" :value="$brand" wire:model="brand" />

            <x-input-text name="price" class="form__item_small" label="Цена" :value="$price" wire:model="price" />

            <div class="form__item">
                <label for="size">@lang('Размер')</label>

                <select wire:model="size" id="size">
                    <option>@lang('Выберите...')</option>

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
            <div class="column " style="gap: 30px; justify-content: center">
                <x-input-text name="view" class="form__item_medium" label="Вид" :value="$view" wire:model="view" />

                <x-input-text name="type" class="form__item_medium" label="Тип" :value="$type" wire:model="type" />

                <x-input-text name="design_and_construction" class="form__item_medium" label="Дизайн и конструкция" :value="$design_and_construction" wire:model="design_and_construction" />
            </div>

            <div class="form__item form__item_medium">
                <label for="image">@lang('Изображение')</label>
                @if($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="@lang('Изображение продукта')">
                @else
                    <img src="{{ Storage::url($product->img_uri) }}" alt="Изображение продукта">
                @endif
                <input wire:model="image" id="image" type="file">

                @error('image')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <input class="form__button" type="submit" value="@lang('Изменить')">

    </form>

</div>
