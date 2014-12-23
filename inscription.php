<?php
include('begin.php');
use utils\Link;

$title = 'Inscription';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Inscription', '#')));


if(isset($_POST['firstName'])) {
    if($_POST['password'] != $_POST['passwordConfirmation']) {
        $_SESSION['lastMessage'] = Popup::verificationPasswordError();
        include('views/includes/head.php');
        include('views/inscription.php');
    } else {
        $user = new User($_POST['adeliNumber'], $_POST['password']);
        $user->setMail($_POST['email']);
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
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
