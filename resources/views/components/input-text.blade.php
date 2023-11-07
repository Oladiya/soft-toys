@props(['name', 'label', 'value'])

<div {{ $attributes->merge(['class' => 'form__item ']) }}>
    <label for="{{ $name }}">@lang($label)</label>
    <input name="{{ $name }}" id="{{ $name }}" @isset($value) value="{{ $value }}" @endisset type="text">

    @error($name)
    <div class="error-message">{{ $message }}</div>
    @enderror
</div>
