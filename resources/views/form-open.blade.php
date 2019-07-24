<form {!! $form->glueAttributes() !!}>
    @if ($form->httpMethod != 'GET')
        @csrf
    @endif

    @if ($form->httpMethod != 'GET' && $form->httpMethod != 'POST')
        @method($form->httpMethod)
    @endif