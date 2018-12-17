<?php

if (!function_exists('zipcode'))
{
    /**
     * @param null $number
     * @return \Canducci\ZipCodePostmon\ZipCode|null
     * @throws Exception
     */
    function zipcode($number = null)
    {
        if (function_exists('app')) // Laravel
        {
            $instance = app('Canducci\ZipCodePostmon\ZipCodeRequest');
        }
        else
        {
            $instance = (new Canducci\ZipCodePostmon\ZipCodeRequest(new Canducci\ZipCodePostmon\Client()));
        }
        if ($number)
        {
            return $instance->find($number);
        }
        return $instance;
    }
}