<div>
    <form
        wire:submit.prevent="login"
        enctype="multipart/form-data" class="form">

        <h1 class="form__title">@lang('Вход')</h1>

        <x-input-text name="email" label="Email" wire:model="email" />

        <x-input-text name="password" label="Пароль" type="password" wire:model="password" />

        <input class="form__button" type="submit" value="@lang('Войти')">

    </form>
</div>
