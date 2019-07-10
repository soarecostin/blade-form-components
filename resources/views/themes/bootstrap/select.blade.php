<div class="form-group">
    @include ('blade-form-components::themes.bootstrap.partials.label')

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

    @include ('blade-form-components::themes.bootstrap.partials.help')
    
    @include ('blade-form-components::themes.bootstrap.partials.errors')
</div>