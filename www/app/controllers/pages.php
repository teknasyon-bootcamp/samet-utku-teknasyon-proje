<?php 
namespace App\controllers;

use \Core\view;

class pages extends \Core\controller
{
	public $params= [];
	public function home()
    {  
		View::render('home.php',$this->params);
    }
	public function news()
    {  
		View::render('news.php',$this->params);
    }
	
	
}