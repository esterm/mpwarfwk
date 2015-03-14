<?php

namespace Mpwarfwk\Component;

class Routing{
	public function __construct() {
       echo "In Routing constructor\n";
   }

   public function getRoute(){
   		return "Controller\\Home\\Home";

   }
   
   
}