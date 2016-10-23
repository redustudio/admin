<?php

namespace Reduvel\Admin;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

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
    }

    /**
     * Application is booting
     *
     * @return void
     */
    public function boot()
    {
        $this->registerViews();
        $this->registerMigrations();
        $this->registerSeeds();
        $this->registerAssets();
        $this->registerTranslations();
        $this->registerConfigurations();
        $this->registerCommands();

        if(! $this->app->routesAreCached() && config('admin.routes')) {
            $this->registerRoutes();
        }
    }

    protected function registerCommands()
    {
        $this->app->bind('reduvel:admin:install', function($app) {
            return new InstallCommand();
        });

        $this->commands('reduvel:admin:install');
    }

    /**
     * Register the package views
     *
     * @return void
     */
    protected function registerViews()
    {
        $this->loadViewsFrom($this->packagePath('resources/views'), 'admin');

        $this->publishes([
            $this->packagePath('resources/views') => base_path('resources/views/reduvel/admin'),
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
     * Register the package database seeds
     *
     * @return void
     */
    protected function registerSeeds()
    {
        $this->publishes([
            $this->packagePath('database/seeds') => database_path('/seeds')
        ], 'seeds');
    }

    /**
     * Register the package public assets
     *
     * @return void
     */
    protected function registerAssets()
    {
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('reduvel/admin'),
        ], 'public');
    }

    /**
     * Register the package translations
     *
     * @return void
     */
    protected function registerTranslations()
    {
        $this->loadTranslationsFrom($this->packagePath('resources/lang'), 'admin');
    }

    /**
     * Register the package configurations
     *
     * @return void
     */
    protected function registerConfigurations()
    {
        $this->mergeConfigFrom(
            $this->packagePath('config/config.php'), 'reduvel.admin'
        );
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
            'namespace' => __NAMESPACE__
        ], function($router) {

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
        return sprintf("%s/../%s", __DIR__ , $path);
    }
}
