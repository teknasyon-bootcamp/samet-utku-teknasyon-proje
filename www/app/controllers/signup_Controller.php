<?php 
namespace App\controllers;

use \Core\view;
use \Core\database;


class signup_Controller extends \Core\controller
{
	public $params= [];
	public function Signup()
    {  
        return (new \Core\classes\user\Signup)->check();
    }
}