<?php
include __DIR__."/Didforsale/autoload.php";


$apikey = '12mqc3srkjcyjzei8z897s4f434';


$client = new Didforsale\Client($apikey);

print_r($client->send_sms('12054538331', array('19492321406'), 'test message'));




?>