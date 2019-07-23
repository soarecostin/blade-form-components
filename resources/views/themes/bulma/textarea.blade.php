<div class="field">
    @include ('blade-form-components::themes.bulma.partials.label')
    
    <div class="control">
        <textarea {!! $element->glueAttributes() !!}>{{ $element->value }}</textarea>
    </div>
    
    @include ('blade-form-components::themes.bulma.partials.help')

    @include ('blade-form-components::themes.bulma.partials.errors')
</div>