<?php namespace Canducci\ZipCodePostmon\Providers;

use Canducci\ZipCodePostmon\Client;
use Canducci\ZipCodePostmon\ZipCodeRequest;
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
        $this->app->singleton('Canducci\ZipCodePostmon\ZipCodeRequest', function($app)
        {
            return new ZipCodeRequest($app['Canducci\ZipCodePostmon\Client']);
        });
    }
}