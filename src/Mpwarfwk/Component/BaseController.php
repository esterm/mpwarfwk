<?php

namespace Mpwarfwk\Component;

abstract class BaseController {
    
    public $_attrBaseController="test";

    public function __construct() {

        echo "Constructor BaseController<br>";
    }

    public function renderTwig($template,$vars) {

      	//new autoloader
		require_once __DIR__.'/../../vendor/autoload.php'; // Include Twig Autoloader
		Twig_Autoloader::register(); // Enable autoloader


		$loader     = new \Twig_Loader_Filesystem( __DIR__.'/../templates' );
		$twig       = new \Twig_Environment( $loader, array() );
		

		$template_variables = array( 
	    'name'      => 'John',
	    'lastname'  => 'Doe'
		);

	
		
		echo $twig->render( 'template_variables.twig', (array) $template_variables );

    }


  

        
}