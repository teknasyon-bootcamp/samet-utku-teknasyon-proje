<?php 
namespace App\models;

class role extends \Core\database
{
	public function __construct()
    {
        $this->table = "role";
        parent::__construct();
        return $this;
    }
}