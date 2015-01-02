<?php
include('begin.php');
use utils\Link;

require_once('libs/password_compat/lib/password.php');
$title = 'Inscription';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Inscription', '#')));


if(isset($_POST['firstName'])) {
    if($_POST['password'] != $_POST['passwordConfirmation']) {
        $_SESSION['lastMessage'] = Popup::verificationPasswordError();
        include('views/includes/head.php');
        include('views/inscription.php');
    } else {
        $user = new User($_POST['adeliNumber'], password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" =>utils\Utils::getOptimalCost(0.3))));
        $user->setMail($_POST['email']);
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
        $user->setAddress($_POST['address']);
        $user->setCp($_POST['cp']);
        $user->setTown($_POST['town']);
        $user->insert();
        $_SESSION['lastMessage'] = Popup::inscriptionOk();
        header('Location: ' . 'index.php');
    }
} else {
    include('views/includes/head.php');
    include('views/inscription.php');
}
include('views/includes/foot.php');
?>
