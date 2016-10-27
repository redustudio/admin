<?php

namespace Reduvel\Admin;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Lavary\Menu\Builder;
use Reduvel\Admin\Commands\PublishCommand;
use Reduvel\Admin\Commands\InstallCommand;

/**
 * Class PackageServiceProvider
 *
 * @package Reduvel\Admin
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom($this->packagePath('config/config.php'), 'reduvel.admin');

        $this->registerProviders();
        $this->bindMenu();
    }

    /**
     * Application is booting
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();
        $this->registerAssets();
        $this->registerTranslations();
        $this->registerConfigurations();

        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
            $this->registerCommands();
        }

        if (! $this->app->routesAreCached() && config('reduvel.admin.route.enabled')) {
            $this->registerRoutes();
        }

        $this->app->make('view')->share('pageTitle', trans('reduvel-admin::page.default_title'));
    }

    /**
     * Register the package providers
     *
     * @return void
     */
    protected function registerProviders()
    {
        $this->app->register(\Lavary\Menu\ServiceProvider::class);
        $this->app->register(\Laravolt\Avatar\ServiceProvider::class);
    }

    /**
     * Bind menu
     *
     * @return void
     */
    protected function bindMenu()
    {
        $this->app->singleton('reduvel.admin.menu', function ($app) {
            return $this->app->make('menu')->make('ReduvelAdminMenu', function (Builder $menu) {
                return $menu;
            });
        });
    }

    /**
     * Register the package commands
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands([
            PublishCommand::class,
            InstallCommand::class
        ]);
    }

    /**
     * Register the package views
     *
     * @return void
     */
    protected function registerViews()
    {
        $this->loadViewsFrom($this->packagePath('resources/views'), 'reduvel-admin');

        $this->publishes([
            $this->packagePath('resources/views') => resource_path('views/vendor/reduvel-admin'),
        ], 'views');
    }

    /**
     * Register the package migrations
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom($this->packagePath('database/migrations'));

        $this->publishes([
            $this->packagePath('database/migrations') => database_path('/migrations')
        ], 'migrations');
    }

    /**
     * Register the package public assets
     *
     * @return void
     */
    protected function registerAssets()
    {
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('vendor/reduvel/admin'),
        ], 'public');
    }

    /**
     * Register the package translations
     *
     * @return void
     */
    protected function registerTranslations()
    {
        $this->loadTranslationsFrom($this->packagePath('resources/lang'), 'reduvel-admin');
    }

    /**
     * Register the package configurations
     *
     * @return void
     */
    protected function registerConfigurations()
    {
        $this->publishes([
            $this->packagePath('config/config.php') => config_path('reduvel/admin.php'),
        ], 'config');
    }

    /**
     * Register the package routes
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $this->app['router']->group([
            'namespace' => __NAMESPACE__ . '\Http\Controllers'
        ], function ($router) {
            $router->group([
                'middleware' => config('reduvel.admin.route.web.middlewares')
            ], function ($router) {
                require $this->packagePath('routes/web.php');
            });
        });
    }

    /**
     * Loads a path relative to the package base directory
     *
     * @param string $path
     * @return string
     */
    protected function packagePath($path = '')
    {
        return sprintf("%s/../%s", __DIR__, $path);
    }
}
