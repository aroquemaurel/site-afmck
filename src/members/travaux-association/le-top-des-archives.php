<?php
$title = 'Le top des archives';
include('../../begin.php');
use utils\Link;
use utils\Rights;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Les travaux de l\'association','#'), new Link('Le top des archives', '#')));

include('../../views/includes/head.php');
include('../../views/members/travaux-association/le-top-des-archives.php');
include('../../views/includes/foot.php');
?>
