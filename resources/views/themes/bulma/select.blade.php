<div class="field">
    @yield ('label-'.$id)
    
    <div class="control">
        <div class="select">
            @yield ('element-'.$id)
        </div>
    </div>

    @yield ('help-'.$id)
    
    @yield ('errors-'.$id)
</div>