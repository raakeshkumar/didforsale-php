INTRODUCTION
------------
This PHP module is basically to facilitate developers to simply USE DidForSale API.


INSTALLATION
------------
* Clone the code
* cd didforsale-php
* composer install

You should have all the codes with you ready to work.

EXAMPLE. Send SMS
-------
```php
    include './vendor/autoload.php';

    $apikey = 'YOUR API KEY';


    $client = new Didforsale\Client($apikey);

    print_r($client->send_sms('XXXXXXXX331', 'XXXXXXXX406', 'Your message to be sent'));
```
EXAMPLE. Make an Outbound Call
-------
```php 

    include './vendor/autoload.php';

    $apikey = 'YOUR API KEY';

    $client = new Didforsale\Client($apikey);

    print_r($client->call('XXXXXXXX331', 'XXXXXXXX406','Your Application Url'));
```
EXAMPLE. Authenticate a user
-------
```php 

    include './vendor/autoload.php';

    $apikey = 'YOUR API KEY';

    $client = new Didforsale\Client($apikey);

    print_r($client->authenticate('XXXXXXXX331', 'XXXXXXXX406','Your Application Url'));
```

Your Application Url should have content in xml

EXAMPLE. Application Url for authenticate User
------
```xml
<?xml version="1.0" encoding="UTF-8"?> 
<Response>
         <say>Your PIN is 8 9 7 0 </Say>
 </Response>
```
