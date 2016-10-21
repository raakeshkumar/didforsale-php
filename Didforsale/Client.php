<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author raakesh
 */
namespace Didforsale;

class Client {
    //put your code here
    protected $url;
    protected $apikey;
            
    
    function __construct($apikey) {
        $this->url = 'http://test.didforsale.com/didforsaleapi/index.php/api/';
        $this->apikey = $apikey;
    }
            
    function send_sms($from, $to, $message) {
        $this->url .= "SMS/Send/{$this->apikey}";
        $method = 'post';
        $data = array('from' => $from, 'to' => $to, 'text' => $message);
        $headers = array('Content-Type' => 'application/json');
        
        $curl_client = new Http\CurlClient();
        $response = $curl_client->request($method, $this->url, $data, $headers);
        
        print_r($response);
        
    }
}
