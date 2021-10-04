<?php 
namespace Core;
class View
{
	public $var = [];
    /**
     * Render a view file
     *
     * @param string $path  The view file path
     *
     * @return void
     */
    public static function render($path,$params)
    {  
        $file = dirname(__DIR__) . "/app/views/$path";  
        if (is_readable($file)) {
            require $file;
        } else {
			$file = dirname(__DIR__) . "/app/views/404.php";  
			if(is_readable($file)) {
				require $file;
			}else{
			throw new \Exception("View Error: $file not found");
			}
		}
    }
	public static function renderText($path,$params)
    {  
        $file = dirname(__DIR__) . "/app/views/$path";  
        if (is_readable($file)) {
            return implode(file( $file));
        } else {
            throw new \Exception("View Error: $file not found");
        }
    }
}