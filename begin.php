<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");

require_once('config.php');
require_once('autoload.php');
require_once('libs/password_compat/lib/password.php');

session_start();
if(!Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->autoconnect();
}
utils\Rights::hasRights();