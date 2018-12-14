<?php namespace Canducci\ZipCodePostmon;

class ZipCode
{
	private $district;
	private $number;
	private $state;
	private $city;

    /**
     * ZipCode constructor.
     * @param null $number
     * @param null $district
     * @param null $city
     * @param null $state
     */
    public function __construct($number = null, $district = null, $city = null, $state = null)
    {
        $this->district = $district;
        $this->city = $city;
        $this->number = $number;
        $this->state = $state;
    }

    /**
     * @return null
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @return null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return null
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return null
     */
    public function getState()
    {
        return $this->state;
    }

}



/*{"bairro": "", "cidade": "Pirapozinho", "estado_info": {"area_km2": "248.221,996",
 "codigo_ibge": "35", "nome": "S\u00e3o Paulo"}, "cep": "19200000",
"cidade_info": {"area_km2": "477,673", "codigo_ibge": "3539202"}, "estado": "SP"}*/