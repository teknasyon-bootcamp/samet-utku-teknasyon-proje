<?php 
namespace Core\classes; 

class logger
{
    public static function write($message,$level)
    {
        $created_at = date("Y-m-d H:i:s");
        $text = $level." ".$created_at." ".$message.PHP_EOL; 
        file_put_contents(dirname(__DIR__)."/../logs/log.txt",$text,FILE_APPEND);
    }
}