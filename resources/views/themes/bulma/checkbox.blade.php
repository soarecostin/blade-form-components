<div class="field">
    <div class="control">
        <label for="{{ $element->name }}" class="{{ implode(" ", $element->labelClass) }}">
            <input type="hidden" name="{{ $element->name }}" value="0">
            <input {!! $element->glueAttributes() !!}>

            {{ $element->label }}
            
            @if (isset($element->required) && $element->required)
                <span>*</span>
            @endif
        </label>

        @include ('blade-form-components::themes.bootstrap.partials.errors')
    </div>
</div>