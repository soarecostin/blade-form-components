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
                'input' => 'label'
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
                'input' => 'label'
            ],
        ],
        'tailwind' => [
            'fields' => [
                'error' => 'border-red-500',
                'input' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline',
                'checkbox' => '',
                'textarea' => '',
                'select' => '',
                'submit' => '',
            ],
            'labels' => [
                'checkbox' => 'checkbox',
                'input' => 'block text-gray-700 text-sm font-bold mb-2'
            ],
        ]
    ]
];
