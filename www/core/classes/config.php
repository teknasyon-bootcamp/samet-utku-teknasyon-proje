<?php 
namespace Core\classes;
class config{
    public static function get(){
        $configFile = dirname(__DIR__)."/../config.php";
        if(file_exists($configFile)){
            return require $configFile;
        }
    }
}