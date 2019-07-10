<div class="form-group">
    @include ('blade-form-components::themes.bootstrap.partials.label')

    @if (isset($inputGroup))<div class="input-group">@endif

        @if (isset($inputGroup['prepend']))<div class="input-group-prepend">{!! $inputGroup['prepend'] !!}</div>@endif

        <input {!! $element->glueAttributes() !!}>

        @if (isset($inputGroup['append']))<div class="input-group-append">{!! $inputGroup['append'] !!}</div>@endif

        @include ('blade-form-components::themes.bootstrap.partials.errors')
        
    @if (isset($inputGroup))</div>@endif

    @include ('blade-form-components::themes.bootstrap.partials.help')
</div>