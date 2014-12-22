<?php
include('../begin.php');
use utils\Link;

if(Visitor::getInstance()->isConnected()) {
    $title = 'La charte AFMcK';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Divers', '#'), new Link('Communication Interne','#')));
    include('../views/includes/head.php');
    include('../views/members/charte.php');
    include('../views/includes/foot.php');
}
?>
