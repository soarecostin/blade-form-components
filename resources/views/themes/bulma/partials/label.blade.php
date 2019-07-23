@if ($element->label)
    <label for="{{ $element->name }}" class="label {{ implode(" ", $element->labelClass) }}">
        {{ $element->label }}
        
        @if (isset($element->required) && $element->required)
            <span>*</span>
        @endif
        
        @if (isset($element->desc))
            <p class="help">{!! $element->desc !!}</p>
        @endif
    </label>
@endif