@section ('label-'.$id)
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
@endsection

@section ('errors-'.$id)
    @if ($errors->has($element->name))
        <span class="invalid-feedback">
            <strong>{{ $errors->first($element->name) }}</strong>
        </span>
    @endif
@endsection

@section ('help-'.$id)
    @if (isset($element->help))
        <small class="form-text text-muted">{!! $element->help !!}</small>
    @endif
@endsection