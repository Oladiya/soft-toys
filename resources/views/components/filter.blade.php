@props(['input', 'inputName', 'clearFunction', 'collapse', 'collapseFunction', 'items', 'title'])

<div class="filter">
    <div class="filter__header">
        <div class="filter__title">@lang($title)</div>
        <div class="row row_center">
            @if($input !== [])
                <div wire:click="{{ $clearFunction }}" class="filter__clear">@lang('Очистить')</div>
            @endif
            @if($collapse)
                <div wire:click="$toggle('{{ $collapseFunction }}')" class="filter__expand"></div>
            @else
                <div wire:click="$toggle('{{ $collapseFunction }}')" class="filter__collapse"></div>
            @endif
        </div>
    </div>
    @unless($collapse)
        <ul class="list filter__body">
            @foreach($items as $item)
                <li class="list__item list__item_filter">
                    <label>
                        <input wire:model.change="{{ $inputName }}" value="{{ $item }}"
                               type="checkbox"> @lang($item)
                    </label>
                </li>
            @endforeach
        </ul>
    @endunless
</div>
