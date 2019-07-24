<div class="field">
    @yield ('label-'.$id)

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

        @yield ('element-'.$id)
        
        @if (!is_null($element->addons))
            </div>
        @endif

        @if (isset($element->addons['append']))
            <div class="control">{!! $element->addons['append'] !!}</div>
        @endif
        
        @if (!is_null($element->addons))
            </div>
        @endif
        
        @yield ('errors-'.$id)

        @yield ('help-'.$id)

    </div>
</div>