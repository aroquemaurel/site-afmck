<?php
$title = 'Les études de l\'association';

include('../../begin.php');
use utils\Link;
use utils\Rights;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Les travaux de l\'association','#'), new Link($title, '#')));

include('../../views/includes/head.php');
include('../../views/members/travaux-association/les-etudes-de-lassociation.php');
include('../../views/includes/foot.php');
?>
