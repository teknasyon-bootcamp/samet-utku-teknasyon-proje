<?php 
namespace Core\classes\user;
class Session{
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
    

}