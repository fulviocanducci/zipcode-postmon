<?php namespace Canducci\ZipCodePostmon;

class State
{
	private $area_km;
	private $code_ibge;
	private $name;

    /**
     * State constructor.
     * @param $name
     * @param $areaKm
     * @param $codeIbge
     */
    public function __construct($name, $areaKm, $codeIbge)
    {
        $this->area_km = $areaKm;
        $this->code_ibge = $codeIbge;
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getAreaKm()
    {
        return $this->area_km;
    }

    /**
     * @return mixed
     */
    public function getCodeIbge()
    {
        return $this->code_ibge;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}

/*
"estado_info": {"area_km2": "248.221,996", "codigo_ibge": "35", "nome": "S\u00e3o Paulo"}
*/