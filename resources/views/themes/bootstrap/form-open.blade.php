<form method="{{ $form->method == 'GET' ? 'GET' : 'POST' }}" action="{{ $form->action }}" autocomplete="{{ $form->autocomplete ? 'on' : 'off' }}">
    @if ($form->method != 'GET')
        @csrf
    @endif

    @if ($form->method != 'GET' && $form->method !='POST')
        @method($form->method)
    @endif