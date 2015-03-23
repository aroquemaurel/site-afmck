<?php
include('../begin.php');
use utils\Link;

$title = 'Mon profil';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"), new Link('Mon profil', '#')));
include('../views/includes/head.php');
include('../views/members/mon-profil.php');
include('../views/includes/foot.php');

?>
