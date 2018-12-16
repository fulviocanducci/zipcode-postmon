<?php namespace Canducci\ZipCodePostmon;

class City
{
    private $area_km;
    private $code_ibge;
    private $name;

    /**
     * City constructor.
     * @param null $name
     * @param null $areaKm
     * @param null $codeIbge
     */
    public function __construct($name = null, $areaKm = null, $codeIbge = null)
    {
        $this->name = $name;
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

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }
}