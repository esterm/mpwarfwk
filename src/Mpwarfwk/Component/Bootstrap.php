<?php

namespace Mpwarfwk\Component;

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

        $controller=$this->getController();
        $params=$this->getPathParams();
        $response=$controller->exec($params);

        return $response;
   }

   private function getController()
   {
   		$routing= new \Mpwarfwk\Component\Routing();
   		$controllername= $routing->getRoute($this->request);
     
   		return $controller=new $controllername();
   }

   private function getPathParams()
   {
      return explode("/",$this->request->path);
   }
   
   
}