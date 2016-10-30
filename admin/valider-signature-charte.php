<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("ADMINISTRATEUR", "SECRETAIRE"));
use database\DatabaseUser;
use utils\Link;
$title = 'Validation de signature de la charte';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Validation de la charte', '#')));
$db = new DatabaseUser();

if(isset($_GET['valid'])) {
    $user = $db->getUserById($_GET['valid']);
    $user->setHasSigned(1);
    if($user->commit()) {
        $_SESSION['lastMessage'] = Popup::successMessage("Le compte à été ajouté à la carte");
        $mailer = new Mailer();
        $mailer->isHTML(true);                                  // Set email format to HTML
        $mailer->Subject .= "Validation de la signature de la charte";
        $mailer->Body = utf8_decode(Mail::getValidationSignature($user));
        $mailer->addAddress($user->getMail(), $user->getFirstName()." ".$user->getLastName());
        $mailer->send();
    }
} else if(isset($_GET['unvalid'])) {
    $user = $db->getUserById($_GET['unvalid']);
    $user->setHasSigned(0);
    if($user->commit()) {
        $_SESSION['lastMessage'] = Popup::successMessage("Le compte n'apparaitra pas sur la carte");
    }
}

$usersToValid = $db->getUsersSigned(2);
$usersNotValidates = $db->getUsersSigned(0) + $db->getUsersSigned(-1);
$usersValides = $db->getUsersSigned(1);
include('../views/includes/head.php');
include('../views/admin/valider-signature-charte.php');
include('../views/includes/foot.php');
?>
