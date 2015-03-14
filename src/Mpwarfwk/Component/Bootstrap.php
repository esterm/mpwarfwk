<?php

namespace Mpwarfwk\Component;

class Bootstrap{
	public function __construct() {
       echo "In BaseClass constructor\n";
   }

   public function execute(){
   		$bootstrap= new \Mpwarfwk\Component\Routing();
   		$controllername= $bootstrap->getRoute();
   		$hellocontroller=new $controllername();
   		$hellocontroller->build();

   }
   
   
}