<?php

function fileExists($file, $folder) {
    return file_exists($folder . $file . '.php');
}

function requireFile($file, $folder) {
    require_once($folder.$file.'.php');
}

function __autoload($className)
{
    $rootPath = ROOT_PATH . '/' . ROOT_PAGE . '/';

    $folder = 'classes/';
    $file = strpos($className, '\\') ? str_replace('\\', DIRECTORY_SEPARATOR, $className) : $className;

    if (fileExists($file, $rootPath.$folder)) {
        requireFile($file, $rootPath.$folder);
    } else {
        $folder = 'classes/Database/';
        if (fileExists($file, $rootPath.$folder)) {
            requireFile($file, $rootPath.$folder);
        } else {
            $folder = 'classes/models/';
            requireFile($file, $rootPath.$folder);
        }
    }
}
