<?php
function __autoload($className)
{
    $rootPath = ROOT_PATH . '/' . ROOT_PAGE . '/';

    $folder = 'classes/';
    $file = strpos($className, '\\') ? str_replace('\\', DIRECTORY_SEPARATOR, $className) : $className;

    $fileName = $rootPath . $folder . $file . '.php';

    if (file_exists($fileName)) {
        require_once $fileName;
    } else {
        $folder .= 'Database/';
        require_once $rootPath . $folder . $file . '.php';
    }


}
