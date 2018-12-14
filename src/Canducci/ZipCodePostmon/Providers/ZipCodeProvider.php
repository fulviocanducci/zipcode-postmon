<?php namespace Canducci\ZipCodePostmon\Providers;

use Canducci\ZipCodePostmon\Client;
use Canducci\ZipCodePostmon\ZipCodeResult;
use Illuminate\Support\ServiceProvider;

class ZipCodeProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->app->singleton('Canducci\ZipCodePostmon\Client', function()
        {
            return new Client();
        });
        $this->app->singleton('Canducci\ZipCodePostmon\ZipCodeResult', function($app)
        {
            return new ZipCodeResult($app['Canducci\ZipCodePostmon\Client']);
        });
    }
}