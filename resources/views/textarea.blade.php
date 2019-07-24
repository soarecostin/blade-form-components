@extends ('blade-form-components::themes.'.$theme.'.textarea')

@section ('element-'.$id)
    <textarea {!! $element->glueAttributes() !!}>{{ $element->value }}</textarea>
@endsection

@include ('blade-form-components::_sections')