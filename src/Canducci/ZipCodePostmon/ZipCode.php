<?php namespace Canducci\ZipCodePostmon;

class ZipCode
{
    private $district;
    private $number;
    private $state;
    private $city;
    private $complement;
    private $address;

    /**
     * ZipCode constructor.
     * @param $number
     * @param $district
     * @param $complement
     * @param City $city
     * @param State $state
     */
    public function __construct($number, $district, $address, $complement, City $city, State $state)
    {
        $this->district = $district;
        $this->city = $city;
        $this->number = $number;
        $this->state = $state;
        $this->complement = $complement;
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

}