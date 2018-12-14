<?php namespace Canducci\ZipCodePostmon;

class ZipCodeResult
{
    private $client;

    /**
     * ZipCodeResult constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param $number
     * @return ZipCode|null
     * @throws \Exception
     */
    public function getZipCode($number)
    {
        $result = $this->client->getZipCode($number);
        if ($result)
        {
            $city = new City($result->cidade,$result->cidade_info->area_km2,$result->cidade_info->codigo_ibge);
            $state = new State($result->estado,$result->estado_info->nome,$result->estado_info->area_km2,$result->estado_info->codigo_ibge);
            $zipCode = new ZipCode($result->cep,$result->bairro,$city,$state);
            return $zipCode;
        }
        return null;
    }
}