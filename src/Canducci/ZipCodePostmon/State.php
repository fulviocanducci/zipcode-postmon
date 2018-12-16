<?php namespace Canducci\ZipCodePostmon;

class State
{
    private $area_km;
    private $code_ibge;
    private $name;
    private $full_name;

    /**
     * State constructor.
     * @param null $name
     * @param null $areaKm
     * @param null $codeIbge
     */
    public function __construct($name = null, $fullName = null,$areaKm = null, $codeIbge = null)
    {
        $this->area_km = $areaKm;
        $this->code_ibge = $codeIbge;
        $this->name = $name;
        $this->full_name = $fullName;
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
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getFullName()
    {
        return $this->full_name;
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