<?php
include('../begin.php');
use utils\Link;

if(Visitor::getInstance()->isConnected()) {
    $title = 'La certification';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('La certification','#')));
    include('../views/includes/head.php');
    include('../views/members/certification.php');
    include('../views/includes/foot.php');
}
?>
