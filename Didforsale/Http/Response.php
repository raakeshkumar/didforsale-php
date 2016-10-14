<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Didforsale\Http;

/**
 * Description of Response
 *
 * @author raakesh
 */
class Response {
    //put your code here
    
    protected $content;
    
    function __construct($content) {
        $this->content = $content;
    }
    
    public function getContent() {
        return json_decode($this->content, TRUE);
    }
    
    public function __toString() {
        return '[Response] '.$this->getContent();
    }
}
