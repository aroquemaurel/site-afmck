<?php
$title = 'Praticiens';

include('begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Praticiens', '#')));
$db = new database\DatabaseUser();
$users = $db->getUsersOnMap();

include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/praticiens.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>
