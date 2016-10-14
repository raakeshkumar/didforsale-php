<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Didforsale\Http;

/**
 * Description of Client
 *
 * @author raakesh
 */
interface Client {
    //put your code here

    public function request($method, $url, $data = array(), $headers = array());
    
}
