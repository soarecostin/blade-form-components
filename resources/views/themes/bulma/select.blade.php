<div class="field">
    @include ('blade-form-components::themes.bulma.partials.label')
    
    <div class="control">
        <div class="select">
            <select {!! $element->glueAttributes() !!}>
                @if (isset($element->nulloption))
                    <option value>{{ $element->nulloption }}</option>
                @endif
            
                @if (isset($element->options))
                    @foreach ($element->options as $optValue => $optLabel)
                        <option value="{{ $optValue }}" {{ in_array($optValue, $element->selected) ? 'selected' : '' }}>{{ $optLabel }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    @include ('blade-form-components::themes.bulma.partials.help')
    
    @include ('blade-form-components::themes.bulma.partials.errors')
</div>