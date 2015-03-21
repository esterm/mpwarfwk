<?php

namespace Mpwarfwk\Component\Templating;

use Mpwarfwk\Component\Templating\iTemplating;

use Twig;


class TwigTemplate implements iTemplating{
	
	private $view;
	private $template;
	private $variables;

	public function __construct()
	{ 
		$routetemplates=__DIR__."/../../../../../../../src/Templates";;
		$loader = new \Twig_Loader_Filesystem( $routetemplates);
		$this->view = new \Twig_Environment( $loader, array() );
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