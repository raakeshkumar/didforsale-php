<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Didforsale\Tests;


use PHPUnit_Framework_TestCase;
use Didforsale\Http\CurlClient;
/**
 * Description of ClientTest
 *
 * @author raakesh
 */
class ClientTest extends PHPUnit_Framework_TestCase {
    //put your code here
    
    
    protected function testCurlClientRequestMethod() {
        $client = new CurlClient();
        
    }
    
}
