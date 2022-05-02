# Translation manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pinetco/translation-manager.svg?style=flat-square)](https://packagist.org/packages/pinetco/translation-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/pinetco/translation-manager/run-tests?label=tests)](https://github.com/pinetco/translation-manager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/pinetco/translation-manager/Check%20&%20fix%20styling?label=code%20style)](https://github.com/pinetco/translation-manager/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/pinetco/translation-manager.svg?style=flat-square)](https://packagist.org/packages/pinetco/translation-manager)

This package provides user interface to improve and replace translations of your application with ease.

## Installation

You can install the package via composer:

```bash
composer require pinetco/laravel-translation-manager
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="translation-manager-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="translation-manager-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="translation-manager-views"
```

## Usage

```php
php artisan translation-manager:import
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/pinetco/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Raviraj Chauhan](https://github.com/rjchauhan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
