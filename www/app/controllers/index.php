<?php 
namespace App\controllers;

use \Core\view;

class index extends \Core\controller
{
	public $params= [];
	public function index()
    {  
		// LOAD TEMPLATE
		$this->params["meta"]=["title"=>"News","description"=>"Description","robots"=>"nofollow,noindex"];  
		$pageView = "/layouts/app.php";
		View::render($pageView,$this->params);
    }
	public function pageViewer()
    {  
		// DYNAMIC VIEWER
		$this->params["meta"]=["title"=>"News","description"=>"Description","robots"=>"nofollow,noindex"];  
		$pageView = "./pages/".implode("/",$this->params["query"])."_page.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
    }
}