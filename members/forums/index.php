<?php
use utils\Link;
use utils\Rights;

include('../../begin.php');


$title = 'Forums';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Forums','#')));

$forumRepo = $entityManager->getRepository('models\forum\Category');

$categories = $forumRepo->findAll();
include('../../views/includes/head.php');
include('../../views/members/forums/index.php');
include('../../views/includes/foot.php');
?>
