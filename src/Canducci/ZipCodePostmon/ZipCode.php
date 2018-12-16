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
     * @return array
     */
    public function toArray()
    {
        return array(
            'district' => $this->district,
            'number' => $this->number,
            'state' => $this->state->toArray(),
            'city' => $this->city->toArray(),
            'complement' => $this->complement,
            'address' => $this->address,
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

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

}