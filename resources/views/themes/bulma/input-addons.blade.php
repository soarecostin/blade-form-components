<div class="field has-addons is-marginless">

    @if (isset($element->addons['prepend']))
    <div class="control">{!! $element->addons['prepend'] !!}</div>
    @endif

    <div class="control is-expanded">
        @yield ('element-'.$id)
    </div>

    @if (isset($element->addons['append']))
    <div class="control">{!! $element->addons['append'] !!}</div>
    @endif

</div>