<div class="form-group">
    @include ('blade-form-components::themes.bootstrap.partials.label')
    
    <textarea {!! $element->glueAttributes() !!}>{{ $element->value }}</textarea>

    @include ('blade-form-components::themes.bootstrap.partials.help')

    @include ('blade-form-components::themes.bootstrap.partials.errors')
</div>