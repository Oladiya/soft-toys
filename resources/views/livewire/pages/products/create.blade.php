<div>

    <form
        wire:submit.prevent="save"
        enctype="multipart/form-data" class="form">

        <h1 class="form__title">@lang('Добавить новый продукт')</h1>

        <x-input-text name="name" label="Название" wire:model="name" />

        <x-input-text name="category" label="Категория" wire:model="category" />

        <div class="form__item">
            <label for="description">@lang('Описание')</label>
            <textarea wire:model="description" id="description" type="text">{{ old('description') }}</textarea>

            @error('description')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__container">

            <x-input-text name="brand" class="form__item_small" label="Бренд" wire:model="brand" />

            <x-input-text name="price" class="form__item_small" label="Цена" wire:model="price" />

            <div class="form__item">
                <label for="size">@lang('Размер')</label>

                <select wire:model="size" id="size">
                    <option>@lang('Выберите...')</option>

                    <option value="small">@lang('small')</option>
                    <option value="medium">@lang('medium')</option>
                    <option value="large">@lang('large')</option>
                </select>

                @error('size')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>


        </div>

        <div class="form__container">
            <div class="column " style="gap: 30px; justify-content: center">
                <x-input-text name="view" class="form__item_medium" label="Вид" wire:model="view" />

                <x-input-text name="type" class="form__item_medium" label="Тип" wire:model="type" />

                <x-input-text name="design_and_construction" class="form__item_medium" label="Дизайн и конструкция" wire:model="design_and_construction" />
            </div>

            <div class="form__item form__item_medium">
                <label for="image">@lang('Изображение')</label>
                @if($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="@lang('Изображение продукта')">
                @else
                    <img src="{{ url('storage/assets/images/photo-blank.webp') }}" alt="Заглушка">
                @endif
                <input wire:model="image" id="image" type="file">

                @error('image')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <input class="form__button" type="submit" value="@lang('Добавить')">

    </form>

</div>
