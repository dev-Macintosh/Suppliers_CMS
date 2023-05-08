<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'core/db.php';
require 'vendor/autoload.php';


class App

{
        
    public static $router;
    
    public static $db;
    
    
    public static function init()
    {
        static::bootstrap();
        
    }
    
    public static function bootstrap()
    {
        static::loadClass("app/models/model_suppliers");
        static::$router = new App\Route();
        static::$db = new App\Db();
        static::$router::start();
        
    }
    
    public static function loadClass($className)
    {
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        include_once ROOTPATH.DIRECTORY_SEPARATOR.$className.'.php';
    }
    
    
}