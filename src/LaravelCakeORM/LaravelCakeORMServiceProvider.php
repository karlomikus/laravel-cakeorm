<?php
namespace Karlomikus\LaravelCakeORM;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Database\Type;
use Illuminate\Support\ServiceProvider;

/**
 * Register CakeORM configuration
 *
 * @author Karlo Mikus <contact@karlomikus.com>
 * @package Karlomikus\LaravelCakeORM
 * @version 0.1.0
 */
class LaravelCakeORMServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Custom types
        $this->registerCustomTypes(config('cakeorm.types', []));

        // Configure CakePHPs default app namespace
        Configure::write('App.namespace', $this->app->getNamespace());

        // Register our ORM manager
        $this->app->singleton('cake.orm', function ($app) {
            return new CakeORMManager($app);
        });

        // Configure connection
        $this->app['cake.orm']->setupManager();
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Configure custom cache config
        Cache::config('laravel-cakeorm', config('cakeorm.metadata_cache'));

        $this->publishes([
            __DIR__.'/config/cakeorm.php' => config_path('cakeorm.php'),
        ]);
    }

    /**
     * Map custom database types
     *
     * @param  array $types
     * @return void
     */
    protected function registerCustomTypes(array $types)
    {
        foreach ($types as $type => $implementation) {
            Type::map($type, $implementation);
        }
    }
}
