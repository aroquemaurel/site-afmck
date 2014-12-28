<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");

require_once('autoload.php');
session_start();
if(!Visitor::getInstance()->isCOnnected()) {
    Visitor::getInstance()->autoconnect();
}
utils\Rights::hasRights();