@section ('label-'.$id)
    @if ($element->label)
        <label for="{{ $element->name }}" class="{{ implode(" ", $element->labelClass) }}">
            {{ $element->label }}
            
            @if (isset($element->required) && $element->required)
                <span class="{{config('blade-form-components.themes.'.$theme.'.required')}}">*</span>
            @endif
            
            @if (isset($element->desc))
                <p class="{{config('blade-form-components.themes.'.$theme.'.desc')}}">{!! $element->desc !!}</p>
            @endif
        </label>
    @endif
@endsection

@section ('errors-'.$id)
    @if ($errors->has($element->name))
        <p class="{{config('blade-form-components.themes.'.$theme.'.error')}}">{{ $errors->first($element->name) }}</p>
    @endif
@endsection

@section ('help-'.$id)
    @if (isset($element->help))
        <p class="{{config('blade-form-components.themes.'.$theme.'.help')}}">{!! $element->help !!}</p>
    @endif
@endsection