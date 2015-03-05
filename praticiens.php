<?php
include('begin.php');
use utils\Link;

$title = 'Praticiens';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Praticiens', '#')));
$db = new DatabaseUser();
$users = $db->getUsersValides();

include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/praticiens.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
