<?php
include('../begin.php');
use utils\Link;

if(Visitor::getInstance()->isConnected()) {
    $title = 'Fiches exercices';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
        new Link('Outils de travail','#'), new Link('Les docs', '#'), new Link('Fiches exercices', '#')));

    include('../views/includes/head.php');
    include('../views/members/fichesexercice.php');
    include('../views/includes/foot.php');
}
?>
