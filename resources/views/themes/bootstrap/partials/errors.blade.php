@if ($errors->has($element->name))
    <span class="invalid-feedback">
        <strong>{{ $errors->first($element->name) }}</strong>
    </span>
@endif