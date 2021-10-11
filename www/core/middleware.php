<?php
namespace Core;

class middleware extends \Core\classes\session{ 
	public function rule($rule){ 
		return $this;
	} 


}