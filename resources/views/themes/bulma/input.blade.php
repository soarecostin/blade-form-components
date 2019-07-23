<div class="field">
    @include ('blade-form-components::themes.bulma.partials.label')

    <div class="control">
        
        @if (!is_null($element->addons))
            <div class="field has-addons is-marginless">
        @endif
        
        @if (isset($element->addons['prepend']))
            <div class="control">{!! $element->addons['prepend'] !!}</div>
        @endif
        
        @if (!is_null($element->addons))
            <div class="control is-expanded">
        @endif

        <input {!! $element->glueAttributes() !!}>
        
        @if (!is_null($element->addons))
            </div>
        @endif

        @if (isset($element->addons['append']))
            <div class="control">{!! $element->addons['append'] !!}</div>
        @endif
        
        @if (!is_null($element->addons))
            </div>
        @endif
        
        @include ('blade-form-components::themes.bulma.partials.errors')

        @include ('blade-form-components::themes.bulma.partials.help')

    </div>
</div>