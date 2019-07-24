<div class="field">
    <div class="control">
        <label for="{{ $element->name }}" class="{{ implode(" ", $element->labelClass) }}">
            @yield ('element-'.$id)

            {{ $element->label }}

            @if (isset($element->required) && $element->required)
                <span>*</span>
            @endif
        </label>

        @yield ('errors-'.$id)
    </div>
</div>