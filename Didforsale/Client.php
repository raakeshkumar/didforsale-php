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

use Didforsale\Exceptions\EnvironmentException;

class Client {

    //put your code here
    protected $url;
    protected $apikey;

    function __construct($apikey) {
        $this->url = 'https://api.didforsale.com/didforsaleapi/index.php/api/';
        $this->apikey = $apikey;
    }

    function send_sms($from, $to, $message) {

        if (!is_array($to)) {
            throw new EnvironmentException("To param should in array format.");
        }

        $this->url .= "SMS/Send/{$this->apikey}";
        $method = 'post';
        $data = array('from' => $from, 'to' => $to, 'text' => $message);
        $headers = array('Content-Type' => 'application/json');

        $curl_client = new Http\CurlClient();
        $response = $curl_client->request($method, $this->url, $data, $headers);

        print_r($response);
    }

    function call($from, $to, $application_url = null) {

        $this->url .= "V2/CallTermination";
        $method = 'post';
        $data = array('from' => $from, 'to' => $to, "apikey" => $this->apikey);
        $headers = array('Content-Type' => 'application/json');
        
        
        if ($application_url) {
            $url_formated = $this->url_format($application_url);
            if (!$this->check_url($url_formated)) {
                throw new EnvironmentException("application url should valid url");
            }
            $data['url'] = $application_url;
        }
        
        $curl_client = new Http\CurlClient();
        $response = $curl_client->request($method, $this->url, $data, $headers);

        print_r($response);
    }
    
    function authenticate($from, $to, $application_url = null) {

        $this->url .= "V2/CallTermination";
        $method = 'post';
        $data = array('from' => $from, 'to' => $to, "apikey" => $this->apikey);
        $headers = array('Content-Type' => 'application/json');
        
        
        if ($application_url) {
            $url_formated = $this->url_format($application_url);
            if (!$this->check_url($url_formated)) {
                throw new EnvironmentException("application url should valid url");
            }
            $data['url'] = $application_url;
        }
        
        $curl_client = new Http\CurlClient();
        $response = $curl_client->request($method, $this->url, $data, $headers);

        print_r($response);
    }

    function url_format($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function check_url($data) {
        if (!filter_var($data, FILTER_VALIDATE_URL)) {
            return false;
        }
        return TRUE;
    }

}
