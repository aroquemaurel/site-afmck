<?php
include('../begin.php');
use utils\Link;

$title = 'Contact';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', '#'),
    new Link('Divers', '#'), new Link('Contact','#')));
include('../views/includes/head.php');
include('../views/members/contact.php');
include('../views/includes/foot.php');
?>
