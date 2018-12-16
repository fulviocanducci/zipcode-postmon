<?php namespace Canducci\ZipCodePostmon;

class City
{
    private $areaKm;
    private $codeIbge;
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
        $this->areaKm = $areaKm;
        $this->codeIbge = $codeIbge;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'areaKm' => $this->areaKm,
            'codeIbge' => $this->codeIbge,
            'name' => $this->name
        );
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return null
     */
    public function getAreaKm()
    {
        return $this->areaKm;
    }

    /**
     * @return null
     */
    public function getCodeIbge()
    {
        return $this->codeIbge;
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