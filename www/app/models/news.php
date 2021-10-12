<?php 
namespace App\models;

class news extends \Core\database
{
	public function __construct()
    {
        $this->table = "news";
        parent::__construct();
        return $this;
    }
}