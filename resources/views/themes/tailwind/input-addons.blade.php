<div class="flex flex-wrap items-stretch w-full relative">

    @if (isset($element->addons['prepend']))
    <div class="flex -mr-px">
        {!! $element->addons['prepend'] !!}
    </div>
    @endif

    <div class="flex-shrink flex-grow flex-auto">
        @yield ('element-'.$id)
    </div>

    @if (isset($element->addons['append']))
    <div class="flex -mr-px">
        {!! $element->addons['append'] !!}
    </div>
    @endif
    
</div>