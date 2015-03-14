<?php

namespace Mpwarfwk\Component;

abstract class BaseController {
    
    public $_attrBaseController="test";

    public function __construct() {

        echo "Constructor BaseController<br>";
    }
        
}