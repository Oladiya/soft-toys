<div>
    <form
        wire:submit.prevent="register"
        enctype="multipart/form-data" class="form">

        <h1 class="form__title">@lang('Регистрация')</h1>

        <x-input-text name="name" label="Имя" wire:model="name" />

        <x-input-text name="email" label="Email" wire:model="email" />

        <x-input-text name="password" label="Пароль" type="password" wire:model="password" />

        <x-input-text name="password_confirmation" label="Подтверждение пароля" type="password" wire:model="password_confirmation" />

        <input class="form__button" type="submit" value="@lang('Зарегистрироваться')">

    </form>
</div>
