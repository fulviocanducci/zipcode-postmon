# Zipcode Postmon

#### Web Service Postmon ZipCode - Github https://github.com/PostmonAPI/postmon

[![Build Status](https://travis-ci.org/fulviocanducci/zipcode-postmon.svg?branch=master)](https://travis-ci.org/fulviocanducci/zipcode-postmon)
[![](https://img.shields.io/packagist/v/canducci/zipcodepostmon.svg)](https://packagist.org/packages/canducci/zipcodepostmon)

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

__Package ZipCode__

#### Facade

__Add namespace:__

```PHP
use Canducci\ZipCodePostmon\Facades\ZipCodeRequest;
```
__Code Example__

```PHP
$zipCodeResult = ZipCodeRequest::find('01414-001');
```

#### Helper

```PHP
$zipCodeResult = zipcode('01414000'); 
//or 
$zipCodeResult = zipcode()->find('01414000');
```

#### Injection

__Add Namespace__

```PHP
use Canducci\ZipCodePostmon\ZipCodeRequest;

```
__Code Example__

```PHP
public function index(ZipCodeRequest $zipcode)
{
      $zipCodeResult = $zipcode->find('01414000');
}      
```

## Summary of How to Use

__Code__

```PHP
$zipCodeResult = ZipCode::find('01414000'); //Facade
$zipCodeResult = $zipcode->find('01414000'); //Contracts
$zipCodeResult = zipcode('01414000'); // Helper
$zipCodeResult = zipcode()->find('01414000'); // Helper
```