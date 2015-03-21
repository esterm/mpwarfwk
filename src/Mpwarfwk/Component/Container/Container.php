<?php
namespace Mpwarfwk\Component\Container;

class Container
{


	public function __construct()
	{

	}

	public function get($service)
	{
		$servicesPath=__DIR__.'../../../config/services.php';
		$servicesStr= file_get_contents($this->servicesPath);
		$config=(array) json_decode($servicesStr);

		$arguments=array();

	
		if(!empty($config[$service]){

		    if (!$config[$service]['arguments']){

			    foreach($config[$service]['arguments'] as $arguments)
			        $arguments[]=new $arguments() 

			    
			    $reflection=new ReflectionClass($config[$service][$controller])

				return $reflection->newInstanceArgs($arguments);
			}
		}

		throw new excption

	}



}