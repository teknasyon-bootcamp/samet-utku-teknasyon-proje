<?php 
namespace App\controllers;

use \Core\view;

class index extends \Core\controller
{
	public $params= [];
	public function index()
    {  
        View::render('index.php',$this->params);
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