<?php 
namespace Core\classes;
class session{
    public static function start()
    {
        session_start([
            'cookie_lifetime' => 86400
        ]);
    }
    public static function destroy()
    {
        session_destroy();
    }
    public static function add($key,$val)
    {
        $_SESSION[$key] = $val;
    }
    public static function get($key)
    {
        if($key == "all"){
            return $_SESSION;
        }
        if(!empty($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return 0;
        }
    }
    

}