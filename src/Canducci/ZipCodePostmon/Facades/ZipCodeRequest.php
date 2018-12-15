<?php namespace Canducci\ZipCodePostmon\Facades;

use Illuminate\Support\Facades\Facade;

class ZipCodeRequest extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Canducci\ZipCodePostmon\ZipCodeRequest';
    }
}