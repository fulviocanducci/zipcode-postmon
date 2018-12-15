<?php namespace Canducci\ZipCodePostmon;

class ZipCodeRequest
{
    private $url = "http://api.postmon.com.br/v1/cep/";
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
    public function find($number)
    {
        if ($this->isValid($number))
        {
            $number = $this->onlyNumber($number);
            $result = json_decode($this->client->getJson($this->url . $number));
            if ($result)
            {
                $complement = $this->getValueOrDefault($result, 'complemento');
                $number = $this->getValueOrDefault($result, 'cep');
                $district = $this->getValueOrDefault($result, 'bairro');
                $cityName = $this->getValueOrDefault($result, 'cidade');
                $stateName = $this->getValueOrDefault($result, 'estado');
                $address = $this->getValueOrDefault($result, 'logradouro');

                if ($this->isExistProperty($result, 'cidade_info'))
                {
                    $cidade_area_km2 = $this->getValueOrDefault($result->cidade_info, 'area_km2');
                    $cidade_codigo_ibge = $this->getValueOrDefault($result->cidade_info, 'codigo_ibge');
                }
                $city = new City($cityName, $cidade_area_km2, $cidade_codigo_ibge);

                if ($this->isExistProperty($result, 'estado_info'))
                {
                    $estado_name = $this->getValueOrDefault($result->estado_info, 'nome');
                    $estado_area_km2 = $this->getValueOrDefault($result->estado_info, 'area_km2');
                    $estado_codigo_ibge = $this->getValueOrDefault($result->estado_info, 'codigo_ibge');
                }
                $state = new State($stateName, $estado_name, $estado_area_km2, $estado_codigo_ibge);

                $zipCode = new ZipCode($number, $district, $address, $complement, $city, $state);

                return $zipCode;
            }
        }
        return null;
    }

    private function isExistProperty($object, $name)
    {
        return property_exists($object, $name);
    }

    private function getValueOrDefault($object, $name, $default = '')
    {
        return $this->isExistProperty($object, $name) ? $object->$name : $default;
    }

    private function isValid($value)
    {
        if (mb_strlen($value) === 8 && preg_match('/^[0-9]{8}$/', $value)) return true;
        if (mb_strlen($value) === 9 && preg_match('/^[0-9]{5}-[0-9]{3}$/', $value)) return true;
        if (mb_strlen($value) === 10 && preg_match('/^[0-9]{2}.[0-9]{3}-[0-9]{3}$/', $value)) return true;
        throw new Exception("ZipCode Format Invalid, example: 01414001 or 01.414-001 or 01414-001");
    }

    private function onlyNumber($value)
    {
        return str_replace(array('.','-'),'', $value);
    }
}