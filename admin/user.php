<?php
include('../begin.php');

use utils\Link;
$db = new DatabaseUser();
$user = $db->getUserById($_GET['id']);
$title = 'Utilisateur '.$user->getFirstName()." ".$user->getLastName();

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Membre '.$user->getFirstName()." ".$user->getLastName(),  '#')));

include('../views/includes/head.php');
include('../views/admin/user.php');
include('../views/includes/foot.php');

?>
