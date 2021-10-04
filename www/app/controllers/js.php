<?php 
namespace App\controllers;

use \Core\view;

class js extends \Core\controller
{
	public $params= [];
	public function btcsignals()
    {  
		View::render('btcsignals/index.php',$this->params);
    }
	
	
}