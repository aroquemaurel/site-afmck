<?php
include('../../begin.php');
use utils\Link;
use utils\Rights;

if(isset($_FILES["file"])) {
    $target_dir = Visitor::getRootPath().'/docs/members/avatars';
    $uploader = new Uploader($target_dir, array("jpg", "png", "jpeg"), 4 * 1024 * 1024*1024);
    $err = false;
    if(file_exists(Visitor::getInstance()->getUser()->getAvatarPath())) {
        rename(Visitor::getInstance()->getUser()->getAvatarPath(), Visitor::getInstance()->getUser()->getAvatarPath().".old");
    }
    $filename = $uploader->upload($_FILES['file']['name'], $_FILES['file']['tmp_name'], $_FILES['file']['size'], Visitor::getInstance()->getUser()->getAvatarFileName());
    if ($filename == null) {
        $err = true;
    } else {
        $err = false;
    }
    if($err) {
        if(file_exists(Visitor::getInstance()->getUser()->getAvatarPath()."old")) {
            rename(Visitor::getInstance()->getUser()->getAvatarPath().".old", Visitor::getInstance()->getUser()->getAvatarPath());
        }
        $_SESSION['lastMessage'] = Popup::errorMessage("Une erreur à eu lieu durant l'envoi de votre avatar.");
    } else {
        if(file_exists(Visitor::getInstance()->getUser()->getAvatarPath()."old")) {
            unlink(Visitor::getInstance()->getUser()->getAvatarPath().".old");
        }
        $_SESSION['lastMessage'] = Popup::successMessage("Votre avatar a bien été modifié");
    }


    header('Location: ' . Visitor::getRootPage().'/members/profil/changer-avatar.php');
    exit();
}
$title = 'Changer son avatar';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Mon profil',Visitor::getRootPage().'/members/mon-profil.php'), new Link('Changer d\'avatar', '#')));
include('../../views/includes/head.php');
include('../../views/members/profil/changer-avatar.php');
include('../../views/includes/foot.php');
?>
