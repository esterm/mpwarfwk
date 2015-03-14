<?php

namespace Mpwarfwk\Component;

class Routing{

	public function __construct() {

       echo "In Routing constructor<br>";
   }

   public function getRoute(){
   		$routingPath=__DIR__."/../../../../../../config/routing.json";
   		$request=new \Mpwarfwk\Component\Request();

   		//http://framework.dev/home/hola/aaa?name=john&surname=doe
   		//var_dump($request->query->getData());
   		//echo "<br>";

   		$routingStr= file_get_contents($routingPath);
   		$json=(array) json_decode($routingStr);
   		
		if ($request->url != '/') {
		    $uri=split("/",$_SERVER['REQUEST_URI']);
	   		return  $json[$uri[1]]->path;
		}

		return $json["/"]->path;
   }

}