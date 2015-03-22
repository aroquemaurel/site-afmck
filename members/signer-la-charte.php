<?php
include('../begin.php');
use utils\Link;

$title = 'Signer la charte';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"), new Link('Signer la charte', '#')));
include('../views/includes/head.php');
include('../views/members/signer-la-charte.php');
include('../views/includes/foot.php');

?>
