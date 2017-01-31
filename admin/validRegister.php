<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("ADMINISTRATEUR", "TRESORIER"));
use database\DatabaseUser;
use utils\Link;
$title = 'Validation des incriptions';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Validation des inscriptions', '#')));
$db = new DatabaseUser();

if(isset($_GET['valid'])) {
    $user = $db->getUserById($_GET['valid']);
    $user->valid();
    if($user->commit()) {
        $_SESSION['lastMessage'] = Popup::validAccount();
        $user->pushNotification("Validation de votre compte",
            "Votre compte a été validé, celui-ci est valable jusqu'à la fin de votre adhésion, le ".$user->getValidDate()->format("d / m / Y"),
            \utils\NotificationHelper::$ADHESIONS, Visitor::getRootPage().'/members/index.php');
    }
} else if(isset($_GET['unvalid'])) {
    $user = $db->getUserById($_GET['unvalid']);
    $user->unvalid();
    $user->commit();
    $_SESSION['lastMessage'] = Popup::unvalidAccount();
}

$usersDisable = $db->getUsersToValid();
$users = $db->getUsersDisableSoon();
include('../views/includes/head.php');
include('../views/admin/validRegister.php');
include('../views/includes/foot.php');
?>
