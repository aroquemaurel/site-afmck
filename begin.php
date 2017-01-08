<?php
use models\articles\Article;

header( 'content-type: text/html; charset=utf-8' );

require_once('classes/Visitor.php');
require_once('config/server.php');
require_once('config/db/logins.php');

include(Visitor::getRootPath().'/config/doctrine.php');
session_start();

require_once('autoload.php');
require_once(Visitor::getRootPath().'/libs/password_compat/lib/password.php');

if(Visitor::getInstance()->isConnected() && !isset($_SESSION['isReloaded'])) {
    session_destroy();
    session_start();
    $_SESSION['isReloaded'] = true;
}

setlocale(LC_ALL, 'fr_FR.utf8');
date_default_timezone_set('Europe/Paris');

if(!Visitor::getInstance()->isConnected()) {
    Visitor::getInstance()->autoconnect();
}
if(!isset($particularRights) || !$particularRights) {
    utils\Rights::hasRights();
}


if(isset($title)) {
    \utils\ArticleHelper::updateArticleDatabase($title, \utils\UrlHelper::getCurrentPath());
}