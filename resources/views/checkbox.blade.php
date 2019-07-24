@extends ('blade-form-components::themes.'.$theme.'.checkbox')

@section ('element-'.$id)
    <input type="hidden" name="{{ $element->name }}" value="0">
    <input {!! $element->glueAttributes() !!}>
@endsection

@include ('blade-form-components::_sections')