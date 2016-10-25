# Reduvel Admin

Admin panel for your Laravel App.

## Installation

This package requires [Laravel 5.3][laravel-install-link] to install.

In order to install Reduvel Admin, just add

    "reduvel/admin": "dev-master"

to your composer.json, then run `composer install` or `composer update`.

After installed,  add the ServiceProvider to the providers array in `config/app.php`

```php
Reduvel\Admin\ServiceProvider::class,
```

Running artisan command from this package

```bash
$ php artisan reduvel:admin:publish
```

This artisan command for publishing assets package, like migrations, config, views, and assets (css & js).

```bash
$ php artisan reduvel:admin:install
```

This artisan command for running migrations and create user root.

## Configuration

Coming soon

## Usage

Coming soon

## About Reduvel

Reduvel is an open source project from [ReduStudio][homepage]

### About ReduStudio

[ReduStudio][homepage] is web development freelancers based in Yogyakarta and East Borneo, Indonesia. We specialise in developing websites and web apps with Laravel, the most popular PHP Framework.

### Let's Start Project With Us

Just Contact Us At:
- Email: [redustudio@gmail.com][mailto]
- Facebook: [ReduStudio's FB Page][fbpage]

## License
The [MIT][mitlink] License (MIT). Please see [License File](LICENSE.md) for more information.


[laravel-install-link]: https://laravel.com/docs/5.3#installation
[screenshot]: admin.png
[homepage]: http://redustudio.com/
[mailto]: mailto:redustudio@gmail.com
[fbpage]: https://www.facebook.com/Redustudio/
[mitlink]: http://opensource.org/licenses/MIT
