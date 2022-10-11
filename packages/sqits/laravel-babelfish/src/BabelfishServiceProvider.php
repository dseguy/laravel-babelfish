<?php

namespace Sqits\Babelfish;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Sqits\Babelfish\Console\InstallCommand;

class BabelfishServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            InstallCommand::class
        ]);

        Route::group([
            'domain' => config('babelfish.domain', null),
            'prefix' => config('babelfish.path'),
            'namespace' => 'Sqits\Babelfish\Http\Controllers',
            'middleware' => config('babelfish.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'babelfish');

        $this->publishes([
            __DIR__.'/../config/babelfish.php' => config_path('babelfish.php'),
        ], 'babelfish-config');

        $this->publishes([
            realpath(__DIR__.'/../public') => public_path('vendor/babelfish'),
        ], ['babelfish-assets']);
        

        $this->publishes([
            __DIR__.'/../database/migrations/2022_10_11_132655_create_languages_table.php' => database_path('migrations/2022_10_11_132655_create_languages_table.php'),
            __DIR__.'/../database/migrations/2022_10_11_132825_create_translations_table.php' => database_path('migrations/2022_10_11_132825_create_translations_table.php'),
        ], 'babelfish-migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/babelfish.php', 'babelfish'
        );
    }
}
