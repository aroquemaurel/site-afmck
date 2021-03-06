<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("ADMINISTRATEUR", "TRESORIER"));
use database\DatabaseUser;
use utils\Link;
$db = new DatabaseUser();
$user = $db->getUserById($_GET['id']);
$title = 'Utilisateur '.$user->getFirstName()." ".$user->getLastName();

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Membres', Visitor::getRootPage().'/admin/members.php'),
    new Link($user->getFirstName()." ".$user->getLastName(),  '#')));

include('../views/includes/head.php');
include('../views/admin/user.php');
include('../views/includes/foot.php');

?>
