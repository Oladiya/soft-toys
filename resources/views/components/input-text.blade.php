@props(['name', 'label', 'value', 'type'])

<div {{ $attributes->merge(['class' => 'form__item ']) }}>
    <label for="{{ $name }}">@lang($label)</label>
    <input name="{{ $name }}" id="{{ $name }}" @isset($value) value="{{ $value }}" @endisset @isset($type) type="{{ $type }}" @else type="text" @endisset>

    @error($name)
    <div class="error-message">{{ $message }}</div>
    @enderror
</div>
