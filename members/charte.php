<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'La charte AFMcK';
    $breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Divers', '#'), new Link('Communication Interne','#')));
    include('../views/includes/head.php');
    include('../views/members/charte.php');
    include('../views/includes/foot.php');
}
?>
