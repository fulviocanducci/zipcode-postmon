# Zipcode Postmon

#### Web Service Postmon ZipCode - Github https://github.com/PostmonAPI/postmon

[![Build Status](https://travis-ci.org/fulviocanducci/zipcode-postmon.svg?branch=master)](https://travis-ci.org/fulviocanducci/zipcode-postmon)
[![](https://img.shields.io/packagist/v/canducci/zipcodepostmon.svg)](https://packagist.org/packages/canducci/zipcodepostmon)
[![](https://img.shields.io/packagist/dt/canducci/zipcodepostmon.svg)](https://packagist.org/packages/canducci/zipcodepostmon)

## Required setup

In the `require` key of `composer.json` file add the following

```PHP
"canducci/zipcodepostmon": "1.*" 
```

Run the Composer update comand

    $ composer update

## Configure in Laravel

In your `config/app.php` add `Canducci\ZipCodePostmon\Providers\ZipCodeProvider::class` to the end of the `providers` array:

```PHP
'providers' => array(
    ...,
    Canducci\ZipCodePostmon\Providers\ZipCodeProvider::class
),
```

At the end of `config/app.php` add `'ZipCodeRequest' => 'Canducci\ZipCodePostmon\Facades\ZipCodeRequest'` to the `aliases` array:

```PHP

'aliases' => array(
    ...,
    'ZipCodeRequest' => Canducci\ZipCode\Facades\ZipCodeRequest::class,
),

```

## How to Use

To use is very simple, pass the ZIP and calls the various types of returns, like this:

#### 1) Facade

- _Add namespace:_

```PHP
use Canducci\ZipCodePostmon\Facades\ZipCodeRequest;
```
- _Code Example_

```PHP
$zipCodeResult = ZipCodeRequest::find('01414-001');
```

#### 2) Helper

- _Code Example_

```PHP
$zipCodeResult = zipcode('01414000'); 
//or 
$zipCodeResult = zipcode()->find('01414000');
```

#### 3) Injection

- _Add Namespace_

```PHP
use Canducci\ZipCodePostmon\ZipCodeRequest;

```
- _Code Example_

```PHP
public function index(ZipCodeRequest $zipCodeRequest)
{
      $zipCodeResult = $zipCodeRequest->find('01414000');
}      
```

## Summary of How to Use

- _Code_

```PHP
$zipCodeResult = ZipCodeRequest::find('01414000'); //Facade
$zipCodeResult = $zipCodeRequest->find('01414000'); //Contracts
$zipCodeResult = zipcode('01414000'); // Helper
$zipCodeResult = zipcode()->find('01414000'); // Helper
```

- _Return_

The return can be null or class instance `ZipCode` `Object` (`Canducci\ZipCodePostMon\ZipCode`)


- _Assessor Methods_

```` php
$zipCodeResult->getNumber() // 01414000
$zipCodeResult->getComplement() // até 1048 - lado par
$zipCodeResult->getDistrict() // Cerqueira César
$zipCodeResult->getAddress() // Rua Haddock Lobo

$zipCodeResult->getCity()->getAreaKm() // 1521,11
$zipCodeResult->getCity()->getCodeIbge() // 3550308
$zipCodeResult->getCity()->getName() // São Paulo

$zipCodeResult->getState()->getAreaKm() // 248.221,996
$zipCodeResult->getState()->getCodeIbge() // 35
$zipCodeResult->getState()->getName() // SP
$zipCodeResult->getState()->getFullName() // São Paulo
$zipCodeResult->getClient() // Empty ZipCode Extra
````

_Or_

```` php
$zipCodeResult->number // 01414000
$zipCodeResult->complement // até 1048 - lado par
$zipCodeResult->district // Cerqueira César
$zipCodeResult->address // Rua Haddock Lobo

$zipCodeResult->city->areaKm // 1521,11
$zipCodeResult->city->codeIbge // 3550308
$zipCodeResult->city->name // São Paulo

$zipCodeResult->state->areaKm // 248.221,996
$zipCodeResult->state->codeIbge // 35
$zipCodeResult->state->name // SP
$zipCodeResult->state->fullName // São Paulo
$zipCodeResult->client // Empty ZipCode Extra
````

- _Methods toArray and toJson_


```` php
$arrayResult = $zipCodeResult->toArray();

Array
(
    [district] => Cerqueira César
    [number] => 01414000
    [state] => Array
        (
            [areaKm] => 248.221,996
            [codeIbge] => 35
            [name] => SP
            [fullName] => São Paulo
        )

    [city] => Array
        (
            [areaKm] => 1521,11
            [codeIbge] => 3550308
            [name] => São Paulo
        )

    [complement] => até 1048 - lado par
    [address] => Rua Haddock Lobo
    [client] =>
)
````

```` php
$jsonResult = $zipCodeResult->toJson();
{
    "district": "Cerqueira C\u00e9sar",
    "number": "01414000",
    "state": {
        "areaKm": "248.221,996",
        "codeIbge": "35",
        "name": "SP",
        "fullName": "S\u00e3o Paulo"
    },
    "city": {
        "areaKm": "1521,11",
        "codeIbge": "3550308",
        "name": "S\u00e3o Paulo"
    },
    "complement": "at\u00e9 1048 - lado par",
    "address": "Rua Haddock Lobo",
    "client": ""
}
````