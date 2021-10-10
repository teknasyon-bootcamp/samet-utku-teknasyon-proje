<?php 
namespace App\controllers;

use \Core\view;
use \Core\database;


class signin_Controller extends \Core\controller
{
	public $params= [];
	public function Signin()
    {  
        return (new \Core\classes\user\Signin)->check();
    }

   
}