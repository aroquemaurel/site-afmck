<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Partenaires';
    $breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Divers', '#'), new Link('Partenaires','#')));
    include('../views/includes/head.php');
    include('../views/members/partenaires.php');
    include('../views/includes/foot.php');
}
?>