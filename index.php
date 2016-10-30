<?php
include('begin.php');

$title = 'Accueil';

$reg = new RegistrationPdf(Visitor::getInstance()->getUser());
$reg->generatePdf();
exit();
include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
include(Visitor::getInstance()->getRootPath().'/views/index.php');
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');

?>


