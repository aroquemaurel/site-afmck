<?php
include('../begin.php');
use utils\Link;

$title = 'Signer la charte';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"), new Link('Signer la charte', '#')));
if(Visitor::getInstance()->getUser()->getHasSigned() != -1) {
    $_SESSION['lastMessage'] = Popup::errorMessage('Vous avez déjà signé la charte, vous ne pouvez être sur cette page');
    header('Location: ' . 'index.php');
}
include('../views/includes/head.php');
include('../views/members/signer-la-charte.php');
include('../views/includes/foot.php');

?>
