<?php
include(Visitor::getInstance()->getRootPage().'begin.php');
use utils\Link;

require_once('libs/password_compat/lib/password.php');
$title = 'Inscription';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Inscription', '#')));
$editing = false;

if(isset($_POST['firstName'])) {
    if($_POST['password'] != $_POST['passwordConfirmation']) {
        $_SESSION['lastMessage'] = Popup::verificationPasswordError();
        include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
        include(Visitor::getInstance()->getRootPath().'/views/inscription.php');
    } else {
        $user = new User($_POST['adeliNumber'], password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" =>utils\Utils::getOptimalCost(0.3))));
        $user->setMail($_POST['email']);
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
        $user->setAddress($_POST['address']);
        $user->setComplementAddress($_POST['complementAddress']);
        $user->setCp($_POST['cp']);
        $user->setTown($_POST['town']);
        $user->setFormationDate(new DateTime("01/".$_POST['formationDate']));
        $user->setLevelFormation($_POST['levelFormation']);
        $user->setPayment($_POST['payment']);
        $user->setPhoneMobile($_POST['phoneMobile']);
        $user->setPhonePro($_POST['phonePro']);
        $user->setNewsletter(!isset($_POST['newsletter']));
        $user->setDisable(false);
        $user->insert();

        $reg = new RegistrationPdf($user);
        $reg->generatePdf();

        $_SESSION['lastMessage'] = Popup::inscriptionOk();
        header('Location: ' . 'index.php');
    }
} else {
    include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
    include(Visitor::getInstance()->getRootPath().'/views/inscription.php');
}
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
