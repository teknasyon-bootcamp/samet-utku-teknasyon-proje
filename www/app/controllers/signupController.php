<?php 
namespace App\controllers;

use \Core\view;
use \Core\database;


class signupController extends \Core\controller
{
	public $params= [];
	public function Signup()
    {  
        return (new \Core\classes\membership\Signup)->check();
    }
}