<?php
namespace Core;
class Error
{
    public static function errorHandler($level, $message, $file, $line)
    {
		
        if (error_reporting() !== 0) {
			$error = [$message, 0, $level, $file, $line];
			
            print_r($error);
        }
    }
    public static function exceptionHandler($exception="")
    { 
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);
		echo "<h1>Fatal error</h1>";
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '" . $exception->getMessage() . "'</p>";
            echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
		exit;
    }
}