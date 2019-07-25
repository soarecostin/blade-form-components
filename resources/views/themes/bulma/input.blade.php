<div class="field">
    @yield ('label-'.$id)

    <div class="control">
        @if (!is_null($element->addons))
            @include ('blade-form-components::themes.bulma.input-addons')
        @else
            @yield ('element-'.$id)
        @endif
        
        @yield ('errors-'.$id)

        @yield ('help-'.$id)

    </div>
</div>