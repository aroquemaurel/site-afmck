<?php
include('../../begin.php');
use utils\Link;
use utils\Rights;

$title = 'Changer son avatar';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Mon profil',Visitor::getRootPage().'/members/mon-profil.php'), new Link('Changer d\'avatar', '#')));
include('../../views/includes/head.php');
include('../../views/members/profil/changer-avatar.php');
include('../../views/includes/foot.php');
?>
