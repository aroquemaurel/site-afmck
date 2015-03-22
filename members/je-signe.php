<?php
include('../begin.php');
use utils\Link;

$title = 'Signer la charte';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'),
    new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Signer la charte', '#'), new Link('Je signe !', '#')));


$user = Visitor::getInstance()->getUser();
if($user->getHasSigned() == -1) {
    $user->setHasSigned(2);
    $user->commit();
} else {
    $_SESSION['lastMessage'] = Popup::errorMessage('Vous avez déjà signé la charte, vous ne pouvez être sur cette page');
    header('Location: ' . 'index.php');
}


include('../views/includes/head.php');
include('../views/members/je-signe.php');
include('../views/includes/foot.php');

?>
