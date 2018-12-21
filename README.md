# Word refiner for laravel collection data

The Laravel Word Refiner package helps you to refine any words from your collection data.

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

## Installation

You can install the package via composer:

```bash
composer require viitorcloudtechnologies/laravel-word-refiner
```

After installation, You need to publish the config file for this package. This will add the file config/refiner.php, where you can add extra word which you want to deprecate from your collection data.

```bash
php artisan vendor:publish --provider="WordRefiner\WordRefinerProvider"
```
### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email vishal@viitorcloud.com or ruchit.patel@viitor.cloud instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
