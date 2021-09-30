<?php 
spl_autoload_register(function($class){
	$path = str_replace("\\","/",$class);
	$fileRoad = (__DIR__)'/../' . $path . '.class.php';
	if(!file_exists($fileRoad)){
		return false;
	} 
    include_once $fileRoad;
}); 