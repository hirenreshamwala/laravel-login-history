# Laravel Login History

[![Latest Version on Packagist](https://img.shields.io/packagist/v/xt/login-history.svg?style=flat-square)](https://packagist.org/packages/xt/laravel-login-history)
[![Total Downloads](https://img.shields.io/packagist/dt/xt/login-history.svg?style=flat-square)](https://packagist.org/packages/xt/laravel-login-history)


Store login history of user (ip, region, country, user agent).

## Installation

You can install the package via composer:

```bash
composer require xt/laravel-login-history
```

## Run Migrations
Publish the migrations with this artisan command:
```cmd
php artisan vendor:publish --tag=laravel-login-history-migrations
```

## Configuration
You can publish the config file with this artisan command:
```cmd
php artisan vendor:publish --tag=laravel-login-history-config
```

## Usage

```php
use Xt\LoginHistory\Traits\HasLoginHistory;

class User extends Model
{
    use HasLoginHistory;
}
```

## After successful login
Call following function after user login successfully
```php
use \Illuminate\Support\Facades\Auth;

Auth::user()->addLoginHistory();
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hiren.reshamwala@gmail.com instead of using the issue tracker.

## Credits

-   [Hiren Reshamwala](https://github.com/hirenreshamwala)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
