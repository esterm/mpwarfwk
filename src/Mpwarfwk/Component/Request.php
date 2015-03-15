<?php

namespace Mpwarfwk\Component;

class Request 
{ 
    public $url;
    public $method;
    public $get;
    public $path;
    public $post;
    public $cookies;
    public $sessions;
    public $server;
    public $files;


    public function __construct($config= array()) 
    {
        echo "Request created<br>";

        if (empty($config)) {
            $config = array(
                'url' => self::getVar('REQUEST_URI', '/'),
                'method' => self::getMethod(),
                'get' => $_GET, 
                'path' => parse_url(self::getVar('REQUEST_URI', '/'))['path'],
                'post' => $_POST,
                'cookies' => $_COOKIE,
                'sessions' => self::getSession(),
                'server' => self::getServer(), 
                'files' => $_FILES
                );
        }

       $this->init($config);
    }



    private function init($properties = array())
    {
        foreach ($properties as $name => $value) {
             $this->$name = $value;
        }
    }
   

    public static function getSession()
    {
        if (isset($_SESSION)){
            return $_SESSION;
        }
    }

     public static function getServer()
     {
        if (isset($_SERVER)){
            return $_SERVER;
        }
    }

    public static function getMethod() 
    {
       if (isset($_REQUEST['_method'])) {
            return $_REQUEST['_method'];
        }
        return self::getVar('REQUEST_METHOD', 'no_method');
    }


    public static function getVar($var, $default = '') 
    {
        if (isset($_SERVER[$var])){
            return $_SERVER[$var];
        } 
        return $default;
    }

     /*public static function parseQuery($url) 
     {

        $params = array();

        $args = parse_url($url);

        if (isset($args['query'])) {
            parse_str($args['query'], $params);
        }
      
        return $params;
    }
*/
}
