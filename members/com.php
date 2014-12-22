<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'La com\'';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Outils de travail','#'), new Link('Les docs', '#'), new Link('La com\'', '#')));
    include('../views/includes/head.php');
    include('../views/members/com.php');
    include('../views/includes/foot.php');
}
?>
