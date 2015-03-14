<?php

namespace Mpwarfwk\Component;

class Bootstrap{
	public function __construct($dev) {
       echo "In Bootstrap constructor. Dev mode: ".$dev."<br>";
   }

   public function execute(){
   		$bootstrap= new \Mpwarfwk\Component\Routing();
   		$controllername= $bootstrap->getRoute();
   		$controller=new $controllername();
   		$controller->build();

   }
   
   
}