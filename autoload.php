<?php
function getRootPage() {
    if(basename(getcwd()) == 'members' || basename(getcwd()) == 'admin') {
        return '../';
    } else {
        return './';
    }
}

function __autoload($className)
{
    $fileName = getRootPage();

    $fileName .= 'classes/';

    if (strpos($className, '\\')) {
        $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $className);
    } else {
        $fileName .= $className;
    }
    $fileName .= '.php';

    require_once $fileName;
}
