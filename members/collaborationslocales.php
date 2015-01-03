<?php
include('../begin.php');
use utils\Link;

$title = 'Collaborations locales';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Actualités en région', '#'), new Link('Collaborations locales','#')));
include('../views/includes/head.php');
include('../views/members/collaborationslocales.php');
include('../views/includes/foot.php');

?>
