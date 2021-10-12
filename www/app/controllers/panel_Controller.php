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
        $this->params["meta"]=["title"=>"News Editor","description"=>"Editor","robots"=>"nofollow,noindex"];  
		$pageView = "./pages/panel/editor.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
		
    }
	public function moderator_admin()
    {  
        $this->params["meta"]=["title"=>"Editor","description"=>"Editor","robots"=>"nofollow,noindex"];  
		$pageView = "./pages/panel/moderator_admin.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params));
		
    }
	public function latest()
    {  
        $this->params["meta"]=["title"=>"Editor","description"=>"Editor","robots"=>"nofollow,noindex"];  
		$pageView = "./pages/panel/latest.php"; 
		$this->params["html"] = View::returnHTML($pageView,$this->params); 
		\Core\classes\header::head("application/json",200,json_encode($this->params)); 
    }
	public function categoryAdd(){
		$this->request = $_POST;

		if(empty($this->request["categoryTitle"]) || $this->request["categoryTitle"]==""){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Lütfen Kategori İsmini Giriniz"]));
		}

		$check = (new \App\models\news_categories)->find([
            "title"=>$this->request["categoryTitle"],
        ])->checkData()->return();

        if($check){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Bu kategori adı bulunmaktadır."]));
		}else{
			$check = (new \App\models\news_categories)->create([
				"title"=>$this->request["categoryTitle"]
			])->find([
				"title"=>$this->request["categoryTitle"]
			])->checkData()->return();

			if($check){
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Başarıyla kategori eklendi","script"=>"location.reload();"]));
			}else{
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Bu kategori adı bulunmaktadır."]));
			}
		}
	}
	public function categoryDelete(){
		$this->request = $_POST;

		if(empty($this->request["id"]) || $this->request["id"]==""){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
		}

		$check = (new \App\models\news_categories)->find([
            "id"=>$this->request["id"],
        ])->checkData()->return();

        if($check){
			$check = (new \App\models\news_categories)
			->delete($this->request["id"])
			->find([
				"id"=>$this->request["id"]
			])
			->checkData()
			->return();

			if(empty($check)){
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Başarıyla silindi","script"=>"location.reload();"]));
			}else{
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
			}

		}else{
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
			
		}
	}
	

	public function newsAdd(){
		$this->request = $_POST;

		if(empty($this->request["title"]) || $this->request["title"]==""){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Haber başlığı bulunamadı"]));
		}

		$check = (new \App\models\news)->find([
            "title"=>$this->request["title"],
        ])->checkData()->return();

        if($check){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Bu haber başlığı bulunmaktadır."]));
		}else{
			$check = (new \App\models\news)->create($this->request)->find([
				"title"=>$this->request["title"]
			])->checkData()->return();

			if($check){
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Başarıyla haber eklendi","script"=>"location.reload();"]));
			}else{
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Bu haber başlığı bulunmaktadır."]));
			}
		}
	}
	public function newsDelete(){
		$this->request = $_POST;

		if(empty($this->request["id"]) || $this->request["id"]==""){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
		}

		$check = (new \App\models\news)->find([
            "id"=>$this->request["id"],
        ])->checkData()->return();

        if($check){
			$check = (new \App\models\news)
			->delete($this->request["id"])
			->find([
				"id"=>$this->request["id"]
			])
			->checkData()
			->return();

			if(empty($check)){
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Başarıyla silindi","script"=>"location.reload();"]));
			}else{
				return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
			}

		}else{
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
			
		}
	}

	
}