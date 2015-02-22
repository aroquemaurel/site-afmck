<?php
function __autoload($className)
{
    $fileName = ROOT_PATH.'/'.ROOT_PAGE.'/';

    $fileName .= 'classes/';

    if (strpos($className, '\\')) {
        $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $className);
    } else {
        $fileName .= $className;
    }
    $fileName .= '.php';

    require_once $fileName;
}
