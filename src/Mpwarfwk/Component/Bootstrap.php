<?php

namespace Mpwarfwk\Component;

class Bootstrap{

	protected $_dev;


	public function __construct($dev) {
       
       $this->_dev=$dev;
       echo "In Bootstrap constructor. Dev mode: ".$this->_dev."<br>";
   }

   public function execute(){
   		$bootstrap= new \Mpwarfwk\Component\Routing();
   		$controllername= $bootstrap->getRoute();
   		$controller=new $controllername();
   		$controller->build();
   }
   
   
}