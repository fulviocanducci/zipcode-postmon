<?php namespace Canducci\ZipCodePostmon\Facades;

use Illuminate\Support\Facades\Facade;

class ZipCodeResult extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Canducci\ZipCodePostmon\ZipCodeResult';
    }
}