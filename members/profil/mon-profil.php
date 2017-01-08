<?php
$title = 'Mon profil';

include('../../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"), new Link('Mon profil', '#')));
include('../../views/includes/head.php');
include('../../views/members/profil/mon-profil.php');
include('../../views/includes/foot.php');

?>
