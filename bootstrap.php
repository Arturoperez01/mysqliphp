<?php
class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            
			$file = __DIR__.'\\lib\\'.$class.'.php';
			
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}
Autoloader::register();
/*
$configuration = array(
    'db_dsn'  => 'mysql:host=localhost;dbname=recluta',
    'db_user' => 'root',
    'db_pass' => null,
);
//*/
$configuration = array(
    'db_dsn'  => 'localhost',
    'db_name'=>'recluta',
    'db_user' => 'root',
    'db_pass' => null,
);