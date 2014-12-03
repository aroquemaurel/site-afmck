<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
require_once('classes/Link.php');
session_start();

$title = 'Connexion';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Connexion en cours', '#')));

Visitor::getInstance()->connect("13234", "456");
$_SESSION['connect'] = Visitor::getInstance()->isConnected();
header('Location: '.Visitor::getInstance()->getLastPage());
?>
