<?php 
namespace App\controllers;

use \Core\view;

class comments_Controller extends \Core\controller
{
	public $params= [];
	public function add(){  
        $this->request=$_POST;
        if(empty($this->request["name"]) || $this->request["name"]==""){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Lütfen Adınızı Giriniz"]));
		}
        if(empty($this->request["newsID"]) || $this->request["newsID"]==""){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
		}
        if(empty($this->request["comment"]) || $this->request["comment"]==""){
			return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Lütfen Yorum Giriniz"]));
		}
        $check = (new \App\models\comments)->create([
            "name"=>$this->request["name"],
            "comments"=>$this->request["comment"],
            "newsID"=>$this->request["newsID"]
        ])->return();
        if($check){
            return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Başarıyla yorum eklendi","script"=>"location.reload();"]));
        }else{
            return \Core\classes\header::head("application/json",200,json_encode(["login"=>0,"notice"=>"Hata"]));
        }
    }
}