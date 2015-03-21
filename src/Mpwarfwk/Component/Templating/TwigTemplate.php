<?php

namespace Mpwarfwk\Component\Templating;

use Mpwarfwk\Component\Templating\iTemplating;

use Twig;


class TwigTemplate implements iTemplating{
	
	private $view;
	
	public function __construct($routetemplates)
	{ 
		$loader     = new \Twig_Loader_Filesystem( $routetemplates);
		$twig       = new \Twig_Environment( $loader, array() );
		
		$this->view=$twig;
	}

	public function renderTemplate($template,$vars=null)
	{
		return $this->view->render( $template, $vars);
	}

	public function assignVars($variables)
	{
		foreach($variables as $key->$value){
			$this->view->assign($key,$value);
		}
	}

}