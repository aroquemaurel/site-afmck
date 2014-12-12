<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'La certification';
    $breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Le kiosque','#')));
    include('../views/includes/head.php');
    include('../views/members/kiosque.php');
    include('../views/includes/foot.php');
}
?>
