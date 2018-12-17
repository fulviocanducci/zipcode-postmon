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

In your `config/app.php` add `'Canducci\ZipCodePostmon\Providers\ZipCodeProvider'` to the end of the `providers` array:

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
    'ZipCodeRequest' => Canducci\ZipCode\Facades\ZipCode::class,
),

```