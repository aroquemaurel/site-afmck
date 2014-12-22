<?php
include('../begin.php');
use utils\Link;

if(Visitor::getInstance()->isConnected()) {
    $title = 'Partenaires';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Divers', '#'), new Link('Partenaires','#')));
    include('../views/includes/head.php');
    include('../views/members/partenaires.php');
    include('../views/includes/foot.php');
}
?>