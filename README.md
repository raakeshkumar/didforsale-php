INTRODUCTION
------------
This PHP module is basically to facilitate developers to simply USE DidForSale API.


INSTALLATION
------------
* Clone the code
* cd didforsale-php
* composer install

You should have all the codes with you ready to work.

EXAMPLE
-------
<?php
    include './vendor/autoload.php';

    $apikey = 'YOUR API KEY';


    $client = new Didforsale\Client($apikey);

    print_r($client->send_sms('XXXXXXXX331', 'XXXXXXXX406', 'Your message to be sent'));