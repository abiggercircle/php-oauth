<?php
namespace OAuth\Support;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Config;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/oauth.php';
        $this->publishes([$configPath => config_path('soda-oauth.php')], 'config');
    }

    /**
     * Register method
     */
    public function register()
    {
        app()->bind('oauth', 'OAuth\Support\Manager');
    }
}
