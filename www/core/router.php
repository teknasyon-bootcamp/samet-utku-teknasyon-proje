<?php 
namespace Core;

class router{ 
	public $routes = [];
	public $dynamicRoutes = [];
	public $staticRoutes = [];
	public $query = [];
	
	public function add($method, $parameters=[]){
		// Route Info
		if(!empty($parameters["dynamic"])){
			$this->dynamicRoutes[$method.$parameters["url"]] = $parameters["url"]; 
		}else{
			$this->staticRoutes[$method.$parameters["url"]] = $parameters["url"]; 
		}
		// Save Parameters
		$this->routes[$method][$parameters["url"]] = $parameters; 
	} 
	public function getRoutes()
	{
		return $this->routes;
	} 
	public function getQuery()
	{
		return $this->query;
	} 
	public function run()
	{
		$url = (!empty($_GET["url"]) ? "/".$_GET["url"] : "/");
		$method = (!empty($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "");
		return $this->Match($method,$url);
	} 
	public function Match($method,$url)
	{ 
		$this->query = $this->getqueries($method,$url);
		if(!empty($this->routes[$method][$this->query[0]])){
			return $this->call($this->routes[$method][$this->query[0]]);
		}
	}
	public function call($match)
	{ 
		if(!empty($match["callback"])){ 
			$match["callback"]();
		}elseif(!empty($match["controller"]) && !empty($match["action"])){
			$this->getNamespace($match);
		}
	}
	public function getNamespace($match)
	{ 
		$namespace = '\App\controllers\\';
		$namespace .= $match["controller"] . '';
		$action = $match["action"];
		if (class_exists($namespace)) { 
		$controller = new $namespace();
		$controller->params["query"] = $this->query[1];
		$controller->$action();
		}else{
		throw new \Exception("Class Not Found ($namespace)", 404);
		}
	}
	public function getqueries($method,$url)
	{
		if(stristr($url, '/') && strlen($url)>1){
			$explode = explode("/",$url);
			$stringQuery = "";
			$dynamicQuery = "";			
			$arrayQuery = []; 
			// Query List
			foreach($explode as $value){
			if($value==""){
				continue;
			}
			$stringQuery .= "/$value";
			$arrayQuery[] = $value;
			}
			// Check Dynamic Route  
			foreach($this->dynamicRoutes as $key => $val){ 
				 if(stristr($method.$url, $key)) { 
					$dynamicQuery = $val;
				 }
			}			
			// Check Static Route
			
			if($dynamicQuery!=""){
			if(empty($this->staticRoutes[$method.$stringQuery])){
				$stringQuery = $dynamicQuery;
			}
			}
			return [$stringQuery,$arrayQuery];
		}else{
			return [$url,[$url]];
		}
	}
}