<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Journées de l\'AFMcK — Brest 2012';
    $breadcrumb = new Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Journées de l\'association','#'), new Link('Brest 2012', '#')));
    include('../views/includes/head.php');
    include('../views/members/journees_brest.php');
    include('../views/includes/foot.php');
}
?>