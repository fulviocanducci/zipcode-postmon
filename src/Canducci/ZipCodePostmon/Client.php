<?php namespace Canducci\ZipCodePostmon;

use Exception;

class Client
{
    public function getJson($url)
    {
        try
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $json = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode != 200)
            {
                throw new Exception("Error Processing Request - Code Error: {$httpCode}", $httpCode);
            }
            curl_close($ch);
            return $json;
        }
        catch (Exception $ex)
        {
            throw $ex;
        }
    }


}