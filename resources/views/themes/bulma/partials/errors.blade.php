@if ($errors->has($element->name))
    <p class="help is-danger">
        {{ $errors->first($element->name) }}
    </p>
@endif