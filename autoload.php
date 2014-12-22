<?php
function __autoload($className)
{
    $fileName = 'classes/';
    if(strpos($className, '\\')) {
        $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $className);
    } else {
        $fileName .= $className;
    }
    $fileName .= '.php';

    require $fileName;
}
