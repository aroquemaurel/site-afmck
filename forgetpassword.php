<?php
include('begin.php');
use utils\Link;

$title = 'J\'ai oublié mon mot de passe';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('J\'ai oublié mon mot de passe', '#')));

if(isset($_POST['adeliNumber']) && isset($_POST['email'])) {
    $db = new DatabaseUser();
    $data = $db->getUser($_POST['adeliNumber'], "");
    if($data != null) {
        $user = new User();
        $user->hydrat($data);
        $user->sendForgetPassword();
        $_SESSION['lastMessage'] = Popup::successMessage("Une demande de nouveau mot de passe a été envoyé.");
    } else {
        $_SESSION['lastMessage'] = Popup::errorMessage("L'utilisateur n'a pas été trouvé");
    }
}
include('views/includes/head.php');
include('views/forgetpassword.php');
include('views/includes/foot.php');
?>
