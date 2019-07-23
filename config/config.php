<?php

return [

    'theme' => 'bootstrap',

    'autocomplete' => 'off',

    'themes' => [
        'bootstrap' => [
            'fields' => [
                'error' => 'is-invalid',
                'input' => 'form-control',
                'checkbox' => 'custom-control-input',
                'textarea' => 'form-control',
                'select' => 'form-control',
                'submit' => 'btn btn-primary',
            ],
            'labels' => [
                'checkbox' => 'custom-control-label',
                'select' => '',
            ],
        ],
        'bulma' => [
            'fields' => [
                'error' => 'is-danger',
                'input' => 'input',
                'checkbox' => 'checkbox',
                'textarea' => 'textarea',
                'select' => 'select',
                'submit' => 'button is-primary',
            ],
            'labels' => [
                'checkbox' => 'checkbox',
                'select' => 'select',
            ],
        ],
    ],
];
