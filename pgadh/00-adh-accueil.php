<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('classes/Visitor.php');
require_once('classes/Breadcrumb.php');
require_once('classes/Link.php');
session_start();

$title = 'Accueil adhérents';
$breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace adhérents', '00-adh-accueil.php')));
include('views/includes/head.php');
include('views/pgadh/00-adh-accueil.php');
include('views/includes/foot.php');
?>