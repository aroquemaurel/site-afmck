<?php
use utils\Link;
use utils\Rights;

include('../../begin.php');


$title = 'Liste des forums';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Liste des forums','#')));

$forumRepo = $entityManager->getRepository('models\forum\Category');

$categories = $forumRepo->findBy(array(), array('position' => 'ASC'));
include('../../views/includes/head.php');
include('../../views/members/forums/index.php');
include('../../views/includes/foot.php');
?>
