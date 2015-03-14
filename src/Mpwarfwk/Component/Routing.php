<?php

namespace Mpwarfwk\Component;

class Routing{

	public function __construct() {

       echo "In Routing constructor<br>";
   }

   public function getRoute(){

   		$url = $_SERVER['REQUEST_URI'];

   		$routingStr=  file_get_contents(__DIR__."/../../../../../../config/routing.json");
   		$json=(array) json_decode($routingStr);
   		
		if ($url != '/') {
		    $uriFirstElement=split("/",$_SERVER['REQUEST_URI'])[1];
	   		return  $json[$uriFirstElement]->path;
		}

		return $json["/"]->path;
   }
   
}