<?php 
namespace App\controllers;

use \Core\view;

class news_Controller extends \Core\controller
{
	public $params= [];
	public function index()
    {  
		// News Viewer
        $newsid = $this->params["query"][1];
        
        $news_data = (new \App\models\news)->find([
            "id"=>$newsid,
        ])->all()->return(0);
        
        /* 
            🤟🤟🤟🤟🤟🤟🤟🤟🤟 SEO ++++ WEB 🤟🤟🤟🤟🤟🤟🤟🤟🤟
            😍 Very Fast
        */
        $this->params["meta"]=["title"=>$news_data["title"],"description"=>$news_data["description"],"robots"=>"nofollow,noindex"];  
        $this->params["news_data"]=$news_data;  
		$pageView = "./pages/news/view.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
    }
}