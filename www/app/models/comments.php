<?php 
namespace App\models;

class comments extends \Core\database
{
	public function __construct()
    {
        $this->table = "comments";
        parent::__construct();
        return $this;
    }
}