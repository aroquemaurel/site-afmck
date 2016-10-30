<?php
include('../../begin.php');
use utils\Link;

$title = 'Changer de mot de passe';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Changer de mot de passe', '#')));

$editing = true;

if(isset($_POST['lastPassword'])) {
    $user = Visitor::getInstance()->getUser();
    if(password_verify($_POST['lastPassword'], $user->getPassword())) {
        if($_POST['password'] == $_POST['passwordConfirmation']) {
            $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" =>utils\Utils::getOptimalCost(0.3))));
            $user->commit();
            $user->clearCookie();
            $_SESSION['lastMessage'] = Popup::successMessage("Le mot de passe à été correctement changé");
        } else {
            $_SESSION['lastMessage'] = Popup::errorMessage('Le mot de passe et sa confirmation sont différents');
        }
    } else {
        $_SESSION['lastMessage'] = Popup::errorMessage('Le mot de passe est incorrect');
    }
}
include('../../views/includes/head.php');
include('../../views/members/profil/password.php');
include('../../views/includes/foot.php');
?>