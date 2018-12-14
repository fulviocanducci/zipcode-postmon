<?php namespace Canducci\ZipCodePostmon;

class City
{
	private $area_km;
	private $code_ibge;

    /**
     * City constructor.
     * @param $area_km
     * @param $code_ibge
     */
    public function __construct($areaKm = null, $codeIbge = null)
    {
        $this->area_km = $areaKm;
        $this->code_ibge = $codeIbge;
    }

    /**
     * @return null
     */
    public function getAreaKm()
    {
        return $this->area_km;
    }

    /**
     * @return null
     */
    public function getCodeIbge()
    {
        return $this->code_ibge;
    }

}

/*{"area_km2": "477,673", "codigo_ibge": "3539202"}*/