<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
require_once('../autoload.php');
session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Contact';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Divers', '#'), new Link('Contact','#')));
    include('../views/includes/head.php');
    include('../views/members/contact.php');
    include('../views/includes/foot.php');
}
?>
