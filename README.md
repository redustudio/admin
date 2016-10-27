# Reduvel Admin

Admin panel for your Laravel App.

![Reduvel Admin][screenshot]

## Installation

This package requires [Laravel 5.3][laravel-install-link] to install.

In order to install Reduvel Admin, just enter on your terminal

```bash
$ composer require reduvel/admin
```

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

Now your admin is ready to use, you can see at http://localhost:8000/dashboard via `php artisan serve`.

## Configuration

You can overide config file after you published it on `config/reduvel/admin.php`.

## Usage

### Menu
Reduvel Admin using [lavary/laravel-menu][laravel-menu-link] for menu management.

Register menu for display it on sidebar menu

```php
// single menu
app('reduvel.admin.menu')->add('Dashboard', ['route' => 'your.route.name'])
    ->data('icon', 'fa fa-dashboard')
    ->data('order', 1); // for sorting menu

// menu with sub menu
$menu = app('reduvel.admin.menu')->add('Menu', '#')
    ->data('icon', 'fa fa-xxx')
    ->data('order', 2);

$menu->add('Sub Menu 1', ['route' => 'your.route.name']);
$menu->add('Sub Menu 2', ['route' => 'your.route.name']);
```

You can write it on Service Provider or Controller constructor.

### Events

You can use this event for example recording user activity, call other functionality, etc.

Event Name | Parameter(s)
--- | ---
reduvel.admin.login | $user
reduvel.admin.logout | $user

### Others

Set title for page

```php
view()->share('pageTitle', 'Dashboard');
```

Write it on every Controller method which displays the page or passing `pageTitle` on view file.

```blade
@extends('reduvel-admin::layouts.master', ['pageTitle' => 'Dashboard'])

@section('content')
    // your html
@endsection
```

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
[screenshot]: reduvel-admin.png
[homepage]: http://redustudio.com/
[mailto]: mailto:redustudio@gmail.com
[fbpage]: https://www.facebook.com/Redustudio/
[mitlink]: http://opensource.org/licenses/MIT
[laravel-menu-link]: https://github.com/lavary/laravel-menu
