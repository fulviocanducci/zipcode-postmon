<?php

if (!function_exists('zipcode'))
{
    /**
     * @param $cep
     * @return $this
     */
    function zipcode()
    {
        return (new Canducci\ZipCodePostmon\ZipCodeResult(new Canducci\ZipCodePostmon\Client()));
    }
}