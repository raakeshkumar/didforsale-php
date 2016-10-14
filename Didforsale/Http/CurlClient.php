<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Didforsale\Http;

/**
 * Description of CurlClient
 *
 * @author raakesh
 */
use Didforsale\Exceptions\EnvironmentException;

class CurlClient implements Client {

    //put your code here

    public function request($method, $url, $data = array(), $headers = array()) {

        $options = $this->options($method, $url, $data, $headers);

        try {
            
            if (!$this->_is_curl_installed()) {
                throw new EnvironmentException('cURL is not installed');
            }
            
            $curl = curl_init();
            
            if (!curl_setopt_array($curl, $options)) {
                throw new EnvironmentException(curl_error($curl));
            }
            
            if (!$response = curl_exec($curl)) {
                throw new EnvironmentException(curl_error($curl));
            }
            
            curl_close($ch);
            
            return new Response($response);
            
        } catch (\ErrorException $ex) {
            if (isset($curl) && is_resource($curl)) {
                curl_close($curl);
            }
            throw $e;
        }
    }
    
    public function options($method, $url, $data = array(), $headers = array()) {
        
        
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_INFILESIZE => -1,
            CURLOPT_HTTPHEADER => array()
        );
        
        foreach ($headers as $key => $value) {
            $options[CURLOPT_HTTPHEADER][] = "$key: $value";
        }
        
        switch (strtolower(trim($method))) {
            case 'get':
                $options[CURLOPT_HTTPGET] = TRUE;
                break;
            case 'post':
                $options[CURLOPT_POST] = true;
                $options[CURLOPT_POSTFIELDS] = json_encode($data);
                break;
            default :
                $options[CURLOPT_CUSTOMREQUEST] = strtoupper($method);
                
        }
        
        return $options;
        
    }

    private function _is_curl_installed() {
        if (in_array('curl', get_loaded_extensions())) {
            return true;
        } else {
            return false;
        }
    }

}
