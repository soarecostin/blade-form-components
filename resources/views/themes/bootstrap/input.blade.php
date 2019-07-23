<div class="form-group">
    @include ('blade-form-components::themes.bootstrap.partials.label')

    @if (!is_null($element->addons))
        <div class="input-group">
    @endif

    @if (isset($element->addons['prepend']))
        <div class="input-group-prepend">{!! $element->addons['prepend'] !!}</div>
    @endif

    <input {!! $element->glueAttributes() !!}>

    @if (isset($element->addons['append']))
        <div class="input-group-append">{!! $element->addons['append'] !!}</div>
    @endif

    @include ('blade-form-components::themes.bootstrap.partials.errors')
        
    @if (!is_null($element->addons))
        </div>
    @endif

    @include ('blade-form-components::themes.bootstrap.partials.help')
</div>