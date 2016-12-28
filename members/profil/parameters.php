<?php
include('../../begin.php');
use utils\Link;

$title = 'Paramètres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Paramètres', '#')));

$editing = true;

if(isset($_POST['firstName'])) {
    $user = Visitor::getInstance()->getUser();
    $user->setAdeliNumber($_POST['adeliNumber']);
    $user->setMail($_POST['email']);
    $user->setFirstName($_POST['firstName']);
    $user->setLastName($_POST['lastName']);
    $user->setAddress($_POST['address']);
    $user->setComplementAddress($_POST['complementAddress']);
    $user->setCp($_POST['cp']);
    $user->setTown($_POST['town']);
    $user->setFormationDate(new DateTime("01/".$_POST['formationDate']));
    $user->setLevelFormation($_POST['levelFormation']);
    $user->setPhoneMobile($_POST['phoneMobile']);
    $user->setPhonePro($_POST['phonePro']);
    $user->setNewsletter(!isset($_POST['newsletter']));
    $user->setPayment($_POST['payment']);
    $user->setValuePaid($_POST['valuePaid']);
    $user->setLatitude("");
    $user->setLongitude("");
    $user->commit();
    $_SESSION['lastMessage'] = Popup::successMessage("Les informations ont été correctement modifiées");
}
include('../../views/includes/head.php');
include('../../views/members/profil/parameters.php');
include('../../views/includes/foot.php');
?>
