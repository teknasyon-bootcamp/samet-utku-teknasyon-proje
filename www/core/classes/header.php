<?php 
namespace Core\classes;
class header{
    public static function head($type,$statusCode,$data){
        header("Content-Type: $type; charset=utf-8");
        http_response_code($statusCode);
        echo $data;
    }
}