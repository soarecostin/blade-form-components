@if ($element->label)
    <label for="{{ $element->name }}" class="{{ implode(" ", $element->labelClass) }}">
        {{ $element->label }}
        
        @if (isset($element->required) && $element->required)
            <span class="font-weight-bold">*</span>
        @endif
        
        @if (isset($element->desc))
            <small class="font-weight-light form-text text-muted">{!! $element->desc !!}</small>
        @endif
    </label>
@endif