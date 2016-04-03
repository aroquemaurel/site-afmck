<?php
header( 'content-type: text/html; charset=utf-8' );

require_once('classes/Visitor.php');
require_once('config/server.php');
require_once('config/db/logins.php');

include(Visitor::getRootPath().'/config/doctrine.php');
session_start();

require_once('autoload.php');
require_once(Visitor::getInstance()->getRootPath().'/libs/password_compat/lib/password.php');

setlocale(LC_ALL, 'fr_FR');

if(!Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->autoconnect();
}
if(!isset($particularRights) || !$particularRights) {
    utils\Rights::hasRights();
}
