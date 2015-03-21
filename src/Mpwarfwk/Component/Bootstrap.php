<?php

namespace Mpwarfwk\Component;

use \Mpwarfwk\Component\Routing\Routing;

class Bootstrap{

	protected $_dev;
  private $request;

	public function __construct($dev)
   {
      //echo "In Bootstrap constructor. Dev mode: ".$this->_dev."<br>";

       $this->_dev=$dev;

   }

   public function handle($request)
   {
        $this->request=$request;

       

        $routing= new Routing();
      
        $routeClass= $routing->getRoute($this->request)->getRouteClass();
        $routeAction= $routing->getRoute($this->request)->getRouteAction();
        //$routeParams= $routing->getRoute($this->request)->getRouteParams();
        
        $controller=new $routeClass();
       

        if ($routeAction!="")
        {
          $response=call_user_func_array(array($controller,$routeAction ), $this->request);
        }
        else
        {
          $response=$controller->mainAction($this->request);
        }
        return $response;
   }

  
  /* private function getPathParams()
   {
      return explode("/",$this->request->path);
   }*/
   
   
}