<?php
$title = 'Signer la charte';

include('../begin.php');
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'),
    new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Signer la charte', '#'), new Link('Je signe !', '#')));


$user = Visitor::getInstance()->getUser();
if($user->getHasSigned() == -1) {
    $user->setHasSigned(1);
    $user->commit();
    $_SESSION['lastMessage'] = Popup::successMessage("Votre demande de signature a bien été prise en compte par l'association, le secrétariat en a été informé. Vous allez recevoir une charte plastifiée.<br/>
            Si vous avez déjà cette charte plastifiée, merci d'envoyer un email à secretariat@afmck.fr.");
} else {
    $_SESSION['lastMessage'] = Popup::errorMessage('Vous avez déjà signé la charte, vous ne pouvez être sur cette page');
}
header('Location: ' . 'index.php');

?>
