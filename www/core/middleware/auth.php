<?php
namespace Core\middleware;

class auth extends \Core\middleware{ 
	public function rule($array=[]){ 
        $userData =  \Core\classes\session::get("all");
        print_r($userData);
        exit;
        return 1;
	} 
}