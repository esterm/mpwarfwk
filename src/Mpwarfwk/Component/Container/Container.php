<?php
namespace Mpwarfwk\Component\Container;

use Mpwarfwk;


class Container
{

	public function __construct()
	{

	}

	public function get($service)
	{
		$servicesPath=__DIR__."/../../../../../../../config/services.json";
      	$servicesStr= file_get_contents($servicesPath);
      	$services=(array) json_decode($servicesStr);

		$arguments=array();
	

		if(!empty($services[$service])){

		    if (!empty($services[$service]->arguments)){
		    	
			    foreach($services[$service]->arguments as $args){
			    	if($this->argIsClass($args)){
			        	$arguments[]=new $args();
			        }
			        else{
			        	$arguments[]=$args;
			        }

			     }

			   
			    $reflection=new \ReflectionClass($services[$service]->class);

				return $reflection->newInstanceArgs($arguments);
			}
		}

		//throw new excption

	}


	private function argIsClass($args){
		return (count(explode("\\", $args))>1);
	}

}