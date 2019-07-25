<div class="form-group">

    @yield ('label-'.$id)

    @if (!is_null($element->addons))
        @include ('blade-form-components::themes.bootstrap.input-addons')
    @else
        @yield ('element-'.$id)

        @yield ('errors-'.$id)
    @endif

    @yield ('help-'.$id)
</div>