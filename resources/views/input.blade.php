@extends ('blade-form-components::themes.'.$theme.'.input')

@section ('element-'.$id)
    <input {!! $element->glueAttributes() !!}>
@endsection

@include ('blade-form-components::_sections')