<?php

namespace Mpwarfwk\Component;

class Routing{
	public function __construct() {
       echo "In Routing constructor\n";
   }

   public function getRoute(){
   	

   		$routingStr=file_get_contents(__DIR__."/../../../../../../config/routing.json");
   		return  json_decode($routingStr)->home->path;

   }
   
   
}