<?php
$title = 'La communication sur le MDT';

include('../../begin.php');
use utils\Link;
use utils\Rights;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Les travaux de l\'association','#'), new Link($title, '#')));

include('../../views/includes/head.php');
include('../../views/members/travaux-association/la-communication-sur-le-MDT.php');
include('../../views/includes/foot.php');
?>
