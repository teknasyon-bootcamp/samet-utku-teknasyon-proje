<?php 
namespace App\models;

class users extends \Core\database
{
	public function __construct()
    {
        $this->table = "users";
        parent::__construct();
        return $this;
    }
}