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

    public function testZipCodeToArrayInstance()
    {
        $instance = $this->getZipCodeRequestInstance();
        $result = $instance->find('01414000');
        $this->assertInternalType('array',$result->toArray());
    }

    public function testZipCodeToJsonOfString()
    {
        $instance = $this->getZipCodeRequestInstance();
        $result = $instance->find('01414000');
        $this->assertJson($result->toJson());
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

    public function testZipCodeRequestWithGetValues()
    {
        $instance = $this->getZipCodeRequestInstance();
        $zipcode = $instance->find('01414000');
        $this->assertEquals('Rua Haddock Lobo', $zipcode->getAddress());

        $this->assertEquals('1521,11', $zipcode->getCity()->getAreaKm());
        $this->assertEquals('3550308', $zipcode->getCity()->getCodeIbge());
        $this->assertEquals('São Paulo', $zipcode->getCity()->getName());

        $this->assertEquals('até 1048 - lado par', $zipcode->getComplement());
        $this->assertEquals('Cerqueira César', $zipcode->getDistrict());
        $this->assertEquals('01414000', $zipcode->getNumber());

        $this->assertEquals('248.221,996', $zipcode->getState()->getAreaKm());
        $this->assertEquals('35', $zipcode->getState()->getCodeIbge());
        $this->assertEquals('SP', $zipcode->getState()->getName());
        $this->assertEquals('São Paulo', $zipcode->getState()->getFullName());

    }

    public function testZipCodeRequestWith_GetValues()
    {
        $instance = $this->getZipCodeRequestInstance();
        $zipcode = $instance->find('01414000');
        $this->assertEquals('Rua Haddock Lobo', $zipcode->address);

        $this->assertEquals('1521,11', $zipcode->city->areaKm);
        $this->assertEquals('3550308', $zipcode->city->codeIbge);
        $this->assertEquals('São Paulo', $zipcode->city->name);

        $this->assertEquals('até 1048 - lado par', $zipcode->complement);
        $this->assertEquals('Cerqueira César', $zipcode->district);
        $this->assertEquals('01414000', $zipcode->number);

        $this->assertEquals('248.221,996', $zipcode->state->areaKm);
        $this->assertEquals('35', $zipcode->state->codeIbge);
        $this->assertEquals('SP', $zipcode->state->name);
        $this->assertEquals('São Paulo', $zipcode->state->fullName);

    }
}