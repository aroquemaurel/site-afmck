<?php
//require_once("/home/afmck/www/crawlprotect/include/cppf.php");
use utils\Link;
require_once('../autoload.php');

session_start();

if(Visitor::getInstance()->isConnected()) {
    $title = 'Accueil membres';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Accueil membres','members/index.php')));
    include('../views/includes/head.php');
    include('../views/members/index.php');
    include('../views/includes/foot.php');
}
?>
