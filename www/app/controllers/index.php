<?php 
namespace App\controllers;

use \Core\view;

class index extends \Core\controller
{
	public $params= [];
	public function index()
    {  
		$this->params["meta"]=["title"=>"News","description"=>"Description","robots"=>"nofollow,noindex"];  
		$pageView = "/layouts/app.php";
		View::render($pageView,$this->params);
		
    }
	public function pageViewer()
    {  
		$this->params["meta"]=["title"=>"News","description"=>"Description","robots"=>"nofollow,noindex"];  
		
		$pageView = "./pages/".implode("/",$this->params["query"])."_page.php";
		View::render($pageView,$this->params); 
    }
	
	public function newsViewer()
    {  
		
    }
	
	public function templateLoad(){
		
		$test = View::renderText('templateload.php',$this->params);
	}
	
	public function dynamicroute()
    {  
		$query = $this->params["query"];
		if(empty($query[2])){
			exit("ID BULUNAMADI");
		}
		echo "ID: ".$query[2];
    }
}