<?php
include('../../begin.php');
use utils\Link;
use utils\Rights;

$title = 'L\'année en cours';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Les travaux de l\'association','#'), new Link($title, '#')));

include('../../views/includes/head.php');
include('../../views/members/travaux-association/lannee-en-cours.php');
include('../../views/includes/foot.php');
?>
