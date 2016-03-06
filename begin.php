<?php
header( 'content-type: text/html; charset=utf-8' );
ini_set('display_errors',1);

require_once('config.php');
require_once('autoload.php');
require_once('libs/password_compat/lib/password.php');

session_start();
if(!Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->autoconnect();
}
if(!isset($particularRights) || !$particularRights) {
    utils\Rights::hasRights();
}
