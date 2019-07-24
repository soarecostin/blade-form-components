@extends ('blade-form-components::themes.'.$theme.'.select')

@section ('element-'.$id)
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
@endsection

@include ('blade-form-components::_sections')