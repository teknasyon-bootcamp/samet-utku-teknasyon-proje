<?php
namespace Core\middleware;

class auth extends \Core\middleware{ 
	public $permissions = [];
        public $userData = [];
        public function rule($array=[]){ 
        $this->userData =  \Core\classes\session::get("login");
        if(empty($this->userData["roleID"])){
                return 0;
        }
        $this->getpermissions();
        foreach($array["permissions"] as $val){
                if(empty($this->permissions[$val])){
                        return 0;
                }
        }
        return 1;
	} 
        public function getpermissions(){  
        if(empty($this->userData["roleID"])){
                return 0;
        }
        $permissions = (new \App\models\role)->find([ "id"=>$this->userData["roleID"], ])->return(0);
        $this->permissions = json_decode($permissions["permissions"],true);
        }
}