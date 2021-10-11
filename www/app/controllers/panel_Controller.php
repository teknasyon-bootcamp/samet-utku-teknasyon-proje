<?php 
namespace App\controllers;

use \Core\view;

class panel_Controller extends \Core\controller
{
	public $params= [];
	public function index()
    {  
        $this->params["meta"]=["title"=>"Panel Giriş","description"=>"Description","robots"=>"nofollow,noindex"];  
		
		$pageView = "./pages/panel/index.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		$this->params["script"] = "$('#someTab').tab('show')"; 
		
		\Core\classes\header::head("application/json",200,json_encode($this->params));
		
    }
	public function logout()
    {  
		session_destroy();
		\Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hoşçakalın...","script"=>'window.location.href = "/";']));
    }
	public function editor()
    {  
        $this->params["meta"]=["title"=>"Editor","description"=>"Editor","robots"=>"nofollow,noindex"];  
		$pageView = "./pages/panel/editor.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
		
    }

	
}