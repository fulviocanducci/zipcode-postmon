<?php namespace Canducci\ZipCodePostmon;

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
            if (!$ch)
            {
                throw new Exception("Error Processing Request", 1);
            }
            $json = curl_exec($ch);
            curl_close($ch);
            return $json;
        }
        catch (\Exception $ex)
        {
            throw $ex;
        }
    }


}