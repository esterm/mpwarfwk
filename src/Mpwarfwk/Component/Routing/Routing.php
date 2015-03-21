<?php

namespace Mpwarfwk\Component\Routing;

use Mpwarfwk\Component\Routing\Route;

class Routing{

   private $jsonDecoded;
   private $routingPath;

   

	public function __construct() {

      echo "In Routing constructor<br>";
      //http://framework.dev/home/hola/aaa?name=john&surname=doe
      //var_dump($request->query->getData());
      //echo "<br>";

      $this->routingPath=__DIR__."/../../../../../../../config/routing.json";
      $routingStr= file_get_contents($this->routingPath);
      $this->jsonDecoded=(array) json_decode($routingStr);
   }

   public function getRoute($request)
   {
		if ($request->url != '/') 
      {
		      $uriArray=explode("/",$request->url);
          $existsController=isset($uriArray[1]);
          $existsAction= isset($uriArray[2]) && $uriArray[2]!="";
          $existsParam1= isset($uriArray[3]) && $uriArray[3]!="";
          
         if($existsController && $existsAction &&  $existsParam1)
         {
            $uriClassMethod=$uriArray[1]."/".$uriArray[2];

            if($existsParam1){
                   $route=new Route( $this->jsonDecoded[$uriClassMethod]->path,$this->jsonDecoded[$uriClassMethod]->method,[$uriArray[3]]);
            }
            else{
                   $route=new Route( $this->jsonDecoded[$uriClassMethod]->path,$this->jsonDecoded[$uriClassMethod]->method,[$uriArray[3]]);
            }
         }
         elseif($existsController && $existsAction)
         {
             $uriClassMethod=$uriArray[1]."/".$uriArray[2];
             $route=new Route( $this->jsonDecoded[$uriClassMethod]->path,$this->jsonDecoded[$uriClassMethod]->method,"");
         }
         elseif($existsController)
         {
             $uriClassMethod=$uriArray[1];
             $route=new Route( $this->jsonDecoded[$uriClassMethod]->path,"","");
         }
         else
         {
             $route=new \Mpwarfwk\Component\Route( $this->jsonDecoded["/"]->path,"","");
         }
		    
          return $route;
      }
   }

}