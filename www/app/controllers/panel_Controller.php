<?php 
namespace App\controllers;

use \Core\view;

class panel_Controller extends \Core\controller
{
	public $params= [];
	public function index()
    {  
        $this->params["meta"]=["title"=>"Panel","description"=>"Description","robots"=>"nofollow,noindex"];  
		
		$pageView = "./pages/panel/index.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
		
    }
}