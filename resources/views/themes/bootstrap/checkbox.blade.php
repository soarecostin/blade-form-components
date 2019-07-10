<div class="form-group">
    <div class="custom-control custom-checkbox">
        
        <input type="hidden" name="{{ $element->name }}" value="0">
        <input {!! $element->glueAttributes() !!}>

        @include ('blade-form-components::themes.bootstrap.partials.label')

        @include ('blade-form-components::themes.bootstrap.partials.errors')
    </div>
</div>