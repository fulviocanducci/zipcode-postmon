<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Canducci/ZipCodePostmon/State.php';
require_once __DIR__ . '/../src/Canducci/ZipCodePostmon/City.php';
require_once __DIR__ . '/../src/Canducci/ZipCodePostmon/ZipCode.php';
require_once __DIR__ . '/../src/Canducci/ZipCodePostmon/ZipCodeRequest.php';
require_once __DIR__ . '/../src/Canducci/ZipCodePostmon/Client.php';

class ZipCodeTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function getUrl($number = null)
    {
        $number = $number ? $number : '01414000';
        return "http://api.postmon.com.br/v1/cep/{$number}";
    }
    public function getClientInstance()
    {
        return new Canducci\ZipCodePostmon\Client();
    }

    public function getZipCodeRequestInstance()
    {
        return new Canducci\ZipCodePostmon\ZipCodeRequest($this->getClientInstance());
    }

    public function testClientInstance()
    {
        $this->assertInstanceOf('Canducci\ZipCodePostmon\Client', $this->getClientInstance());
    }

    public function testZipCodeRequestInstance()
    {
        $this->assertInstanceOf('Canducci\ZipCodePostmon\ZipCodeRequest', $this->getZipCodeRequestInstance());
    }

    public function testClientToJson()
    {
        $instace = $this->getClientInstance();
        $json = $instace->getJson($this->getUrl());
        $this->assertJson($json);
    }

    public function testZipCodeInstance()
    {
        $instance = $this->getZipCodeRequestInstance();
        $result = $instance->find('01414000');
        $this->assertInstanceOf('Canducci\ZipCodePostmon\ZipCode', $result);
    }

    /**
     * @expectedException Exception
     */
    public function testZipCodeRequestErrorFormatNumber()
    {
        $instance = $this->getZipCodeRequestInstance();
        $instance->find('');
    }

    /**
     * @expectedException Exception
     */
    public function testClientError404()
    {
        $instace = $this->getClientInstance();
        $json = $instace->getJson($this->getUrl('00000000'));
    }
}