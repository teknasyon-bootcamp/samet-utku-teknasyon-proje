<?php 
namespace Core\classes;
class config{
    public static function get($configFile = "./../config.php"){
        if(file_exists($configFile)){
            return require $configFile;
        }
    }
}