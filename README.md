# A collection of Blade Components for quick & easy forms in Bootstrap and Bulma

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://travis-ci.org/soarecostin/blade-form-components.svg?branch=master)](https://travis-ci.org/soarecostin/blade-form-components)
[![StyleCI](https://github.styleci.io/repos/195053164/shield?branch=master)](https://github.styleci.io/repos/195053164)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/soarecostin/blade-form-components/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/soarecostin/blade-form-components/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/soarecostin/blade-form-components/badges/build.png?b=master)](https://scrutinizer-ci.com/g/soarecostin/blade-form-components/build-status/master)
[![Total Downloads](https://img.shields.io/packagist/dt/soarecostin/blade-form-components.svg?style=flat-square)](https://packagist.org/packages/soarecostin/blade-form-components)

This package allows to you build forms in blade in a clean and easy way. It provides a `@form` directive that you can use in Blade in order to render forms. The forms can be rendered in *Bootstrap*, *Bulma* or *Tailwind*.

## Installation

You can install the package via composer:

```bash
composer require soarecostin/blade-form-components
```

## Usage

### Example
A demo usage of this package can be seen at: [https://bfc-demo.dev.soa.re/](https://bfc-demo.dev.soa.re/)
([github repo](https://github.com/soarecostin/blade-form-components-demo))

The demo uses the following Blade template in order to render the form:
```blade
@form('open')

    @form('input', ['name' => 'id', 'disabled' => true, 'value' => 1])
    
    @form('input', ['name' => 'name', 'required' => true, 'placeholder' => 'John Doe'])
    
    @form('password', ['name' => 'password', 'required' => true, 'help' => 'Minimum 6 characters'])
    
    @form('email', ['name' => 'email', 'required' => true, 'placeholder' => 'john.doe@gmail.com'])

    @form('input', ['name' => 'price', 'class' => 'is-rounded is-expanded', 'required' => true,
        'addons' => $priceAddons,
    ])

    @form('textarea', ['name' => 'message', 'rows' => 6, 'desc' => 'Let us know how we can help you below'])

    @form('select', [
        'name' => 'language',
        'label' => 'Language',
        'options' => [
            'en' => 'English',
            'fr' => 'French'
        ],
        'nulloption' => 'Please select',
    ])

    @form('checkbox', ['name' => 'terms', 'label' => 'I agree to the Terms and Conditions'])

    @form('submit', ['name' => 'Submit', 'class' => 'is-warning'])

@form('close')
```

### Customization
You can publish the configuration file, that contains all the available checks using:
```php
php artisan vendor:publish --provider=SoareCostin\BladeFormComponents\BladeFormComponentsServiceProvider
```

This will publish a `blade-form-components.php` file in your config folder.


### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email soarecostin@gmail.com instead of using the issue tracker.

## Credits

- [Costin Soare](https://github.com/soarecostin)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
