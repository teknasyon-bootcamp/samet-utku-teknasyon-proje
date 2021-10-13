<?php 
namespace App\controllers;

use \Core\view;

class news_Controller extends \Core\controller
{
	public $params= [];
	public function index()
    {  
		// Select News and Viewer
        $newsid = $this->params["query"][1];
        $news_data = (new \App\models\news)->find([
            "id"=>$newsid,
        ])->return(0);
        $this->params["newsComments"] = (new \App\models\comments)->find([
            "newsID"=>$newsid
        ])->return();
        $this->params["meta"]=["title"=>$news_data["title"],"description"=>$news_data["description"],"robots"=>"nofollow,noindex"];  
        $this->params["news_data"]=$news_data;  
		$pageView = "./pages/news/view.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
    }

    public function category()
    {  
		// News Category
        $categoryid = $this->params["query"][1];
        $categorydata = (new \App\models\news_categories)->find([
            "id"=>$categoryid,
        ])->return(0);
        $this->params["newsList"] = (new \App\models\news)->find([
            "categoryID"=>$categoryid,
        ])->return();
        
        $this->params["meta"]=["title"=>$categorydata["title"]." - Haberleri Son Dakika ŞOK ŞOK","description"=>"Haberin Adresine Hoşgeldiniz... ".$categorydata["title"]." Haberlerini başka yerde aramayın.","robots"=>"nofollow,noindex"];  
        $this->params["categoryInfo"]=$categorydata; 

		$pageView = "./pages/_page.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
    }



    

}