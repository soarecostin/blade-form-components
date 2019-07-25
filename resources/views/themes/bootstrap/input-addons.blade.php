<div class="input-group">

    @if (isset($element->addons['prepend']))
    <div class="input-group-prepend">{!! $element->addons['prepend'] !!}</div>
    @endif

    @yield ('element-'.$id)

    @if (isset($element->addons['append']))
    <div class="input-group-append">{!! $element->addons['append'] !!}</div>
    @endif

    @yield ('errors-'.$id)
    
</div>