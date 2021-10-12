<?php 
namespace App\models;

class news_categories extends \Core\database
{
	public function __construct()
    {
        $this->table = "news_categories";
        parent::__construct();
        return $this;
    }
}