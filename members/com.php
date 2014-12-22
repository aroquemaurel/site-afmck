<?php
include('../begin.php');
use utils\Link;

if(Visitor::getInstance()->isConnected()) {
    $title = 'La com\'';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Outils de travail','#'), new Link('Les docs', '#'), new Link('La com\'', '#')));
    include('../views/includes/head.php');
    include('../views/members/com.php');
    include('../views/includes/foot.php');
}
?>
