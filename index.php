<?php
include(Visitor::getInstance()->getRootPage().'begin.php');

$title = 'Accueil';

include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/index.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>


