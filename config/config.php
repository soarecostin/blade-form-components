<?php

return [

    'theme' => 'bootstrap',

    'autocomplete' => 'off',

    'themes' => [
        'bootstrap' => [
            'fields' => [
                'default' => 'form-control',
                'checkbox' => 'custom-control-input',
                'submit' => 'btn btn-primary',
                'is-error' => 'is-invalid',
            ],
            'labels' => [
                'default' => 'label',
                'checkbox' => 'custom-control-label',
            ],
            'error' => 'invalid-feedback font-weight-bold mb-0',
            'help' => 'form-text text-muted small',
            'desc' => 'font-weight-light form-text text-muted',
            'required' => 'font-weight-bold',
        ],
        'bulma' => [
            'fields' => [
                'default' => '',
                'input' => 'input',
                'checkbox' => 'checkbox',
                'textarea' => 'textarea',
                'select' => 'select',
                'submit' => 'button is-primary',
                'is-error' => 'is-danger',
            ],
            'labels' => [
                'default' => 'label',
                'checkbox' => 'checkbox',
            ],
            'error' => 'help is-danger',
            'help' => 'help',
            'desc' => 'help',
            'required' => '',
        ],
        'tailwind' => [
            'fields' => [
                'default' => 'block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 mb-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500',
                'checkbox' => 'mr-2 text-gray-700 text-sm font-bold',
                'submit' => 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline',
                'is-error' => 'border-red-500',
            ],
            'labels' => [
                'default' => 'block text-gray-700 text-sm font-bold mb-2',
                'checkbox' => 'text-gray-700 text-sm font-bold',
            ],
            'error' => 'text-red-500 text-xs italic',
            'help' => 'text-gray-600 text-xs italic',
            'desc' => 'text-gray-600 text-xs italic',
            'required' => '',
        ],
    ],
];
