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
        $instance = (new Canducci\ZipCodePostmon\ZipCodeRequest(new Canducci\ZipCodePostmon\Client()));
        if ($number)
        {
        	return $instance->find($number);
        }
        return $instance;
    }
}