![CampingCare](https://storage.googleapis.com/campingcare-static/images/logo-web-small.png) 
# Camping Care PHP SDK #

Connect to the Camping.care system to get data. This could be park, accommodation, prices, availability, reservations, invoicing and contact data.
Also you can create reservations, and contact.

<!-- [![Build Status](https://travis-ci.org/mollie/mollie-api-php.png)](https://travis-ci.org/mollie/mollie-api-php)
[![Latest Stable Version](https://poser.pugx.org/mollie/mollie-api-php/v/stable)](https://packagist.org/packages/mollie/mollie-api-php)
[![Total Downloads](https://poser.pugx.org/mollie/mollie-api-php/downloads)](https://packagist.org/packages/mollie/mollie-api-php) -->

## Requirements ##
To use the Camping.care PHP SDK, the following things are required:

+ Get yourself a free [Camping.care Account](https://camping.care/). No sign up costs.
+ Create a Camping.care [API key](https://camping.care/settings/api)
+ Now you're ready to use the Camping.care PHP API client in test mode.
+ PHP >= 5.3
+ PHP cURL extension

## Installation ##

By far the easiest way to install the Camping.care PHP SDK is to require it with [Composer](http://getcomposer.org/doc/00-intro.md).

    $ composer require CampingCare/campingcare-php-sdk:dev-master

    {
        "require": {
            "CampingCare/campingcare-php-sdk": "dev-master"
        }
    }

You may also git checkout or [download all the files](https://github.com/CampingCare/campingcare-php-sdk/archive/master.zip), and include the Camping.care PHP sdk manually.

## Getting started ##

Requiring the included autoloader. If you're using Composer, you can skip this step.

```php
require_once('vendor/autoload.php');
```

Initializing the Camping.care PHP SDK, and setting your API key.

```php
$campingcare = new campingcare_api;
$campingcare->set_api_key("YOUR SECRET API KEY");
```

Getting park information.

```php
$park = $campingcare->get_park();
```

## API documentation ##
If you wish to learn more about our API, please visit the [Camping.care Portal](https://www.camping.care/developer/). API Documentation is available in English.

## License ##
[BSD (Berkeley Software Distribution) License](https://opensource.org/licenses/bsd-license.php).
Copyright (c) 2013-2017, Boekanders B.V.

## Support ##
Contact: [camping.care](https://camping.care) — support@camping.care — + 31 85 065 3614


