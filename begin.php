<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");

require_once('autoload.php');
session_start();

$currentFile = '';
$currentDir = '';
if(basename(getcwd()) == 'members') {
    $currentFile .= 'members/';
    $currentDir = 'members/';
}

$root = getcwd();

$currentFile .= basename($_SERVER['PHP_SELF']);

if(!Visitor::getInstance()->hasRights($currentFile)) {
    $_SESSION['lastMessage'] = Popup::forbidden();
    header('Location: ' . ($currentDir == 'members/' ? '../index.php' : 'index.php'));
    exit();
}
