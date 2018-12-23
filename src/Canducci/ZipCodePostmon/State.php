<?php namespace Canducci\ZipCodePostmon;

class State
{
    private $areaKm;
    private $codeIbge;
    private $name;
    private $fullName;

    /**
     * State constructor.
     * @param null $name
     * @param null $areaKm
     * @param null $codeIbge
     */
    public function __construct($name = null, $fullName = null, $areaKm = null, $codeIbge = null)
    {
        $this->areaKm = $areaKm;
        $this->codeIbge = $codeIbge;
        $this->name = $name;
        $this->fullName = $fullName;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'areaKm' => $this->areaKm,
            'codeIbge' => $this->codeIbge,
            'name' => $this->name,
            'fullName' => $this->fullName
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
        return $this->fullName;
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