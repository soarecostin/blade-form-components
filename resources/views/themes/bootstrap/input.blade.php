<div class="form-group">
    @yield ('label-'.$id)

    @if (!is_null($element->addons))
        <div class="input-group">
    @endif

    @if (isset($element->addons['prepend']))
        <div class="input-group-prepend">{!! $element->addons['prepend'] !!}</div>
    @endif

    @yield ('element-'.$id)

    @if (isset($element->addons['append']))
        <div class="input-group-append">{!! $element->addons['append'] !!}</div>
    @endif

    @yield ('errors-'.$id)
        
    @if (!is_null($element->addons))
        </div>
    @endif

    @yield ('help-'.$id)
</div>