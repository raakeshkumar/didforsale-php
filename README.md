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

    print_r($client->call('XXXXXXXX331', 'XXXXXXXX406','Your Application url'));
```
EXAMPLE. Authenticate a user
-------
```php 

    include './vendor/autoload.php';

    $apikey = 'YOUR API KEY';

    $client = new Didforsale\Client($apikey);

    print_r($client->authenticate('XXXXXXXX331', 'XXXXXXXX406','Your Application url'));
```

from: This will be the Caller ID of the call('XXXXXXXX331').
to: Number that should be Dialed('XXXXXXXX406')
Application url: This is web url, where your application reside, this URL will be called as soon as call is connected. If no URL, then call will be automatically connected to FROM number.

Your Application url should have content in xml

EXAMPLE. Application url for authenticate User
------
```xml
<?xml version="1.0" encoding="UTF-8"?> 
<Response>
         <say>Your PIN is 8 9 7 0 </Say>
 </Response>
```
Example. Application url for outbound call
-------
```xml
<?xml version="1.0" encoding="UTF-8"?> 
<Response>
    <Say>Hello there.</Say>
<Gather numDigits="1" action="hello-world-handle-key.php" method="POST">
    <Say>
        Press 1 To speak with Support. Press 2 to record your message. Press any other key to start over.
    </Say>
    </Gather>
</Response>
```
