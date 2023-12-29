<?php

namespace AmplifiedHQ\Laravatar\Providers;

use Illuminate\Support\ServiceProvider;
use AmplifiedHQ\Laravatar\Laravatar;

final class LaravatarServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     * @since 1.0.0
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/laravatar.php' => config_path('laravatar.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     * @since 1.0.0
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/laravatar.php', 'laravatar');

        $this->app->singleton('laravatar', function () {
            return new Laravatar;
        });
    }
}
