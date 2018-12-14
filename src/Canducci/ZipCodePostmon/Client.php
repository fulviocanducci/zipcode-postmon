<?php namespace Canducci\ZipCodePostmon;

class Client
{
    public function getZipCode($number)
    {
        try
        {
            if (Client::parse($number))
            {
                $url = "http://api.postmon.com.br/v1/cep/{$number}";
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                if (!$ch) throw new Exception("Error Processing Request", 1);                        
                $result = curl_exec($ch);
                curl_close($ch);
                if ($result)
                {
                    return json_decode($result);
                }
            }                        
            return null;
        }
        catch (\Exception $ex)
        {
            throw $ex;
        }
    }

    public static function parse($cep)
    {        
        if (mb_strlen($cep) === 8 && preg_match('/^[0-9]{8}$/', $cep)) return true;
        if (mb_strlen($cep) === 9 && preg_match('/^[0-9]{5}-[0-9]{3}$/', $cep)) return true;
        throw new Exception("ZipCode Format Invalid, example: 01414001");
    }
}