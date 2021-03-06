<?php
include('begin.php');
use database\DatabaseUser;
use utils\Link;

$title = 'J\'ai oublié mon mot de passe';
$db = new DatabaseUser();
if(!isset($_GET['s']) || !isset($_GET['u'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous n'avez pas le droit d'être ici");
    header('Location: ' . 'index.php');
}
if(isset($_POST['password']) && isset($_POST['passwordConfirmation'])) {
    if($_POST['password'] == $_POST['passwordConfirmation']) {
        $user = $db->getUserById($_POST['user']);
        $user->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => utils\Utils::getOptimalCost(0.3))));
        $user->setHashPassword("");
        $user->commit();
        $_SESSION['lastMessage'] = Popup::successMessage("Le mot de passe à bien été changé, vous pouvez vous connecter");
        header('Location: ' . 'index.php');
    } else {
        $_SESSION['lastMessage'] = Popup::errorMessage("Erreur dans la modification du mot de passe");
    }
}


$user = $db->getUserById($_GET['u']);
if($user == null || $_GET['s'] != $user->getHashPassword()) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous n'avez pas le droit d'être ici");
    header('Location: ' . 'index.php');
}

$title = 'Modifier le mot de passe';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Modifier le mot de passe', '#')));

include(Visitor::getRootPath().'/views/includes/head.php');
include(Visitor::getRootPath().'/views/setpassword.php');
include(Visitor::getRootPath().'/views/includes/foot.php');
?>


