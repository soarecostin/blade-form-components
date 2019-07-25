<div class="mb-6">
    @yield ('label-'.$id)
    
    @if (!is_null($element->addons))
        @include ('blade-form-components::themes.tailwind.input-addons')
    @else
        @yield ('element-'.$id)
    @endif
    
    @yield ('help-'.$id)
    
    @yield ('errors-'.$id)
</div>