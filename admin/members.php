<?php
include('../begin.php');
utils\Rights::hasRights(array("ADMINISTRATEUR", "TRESORIER"));
use utils\Link;
$title = 'Liste des membres';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Liste des membres', '#')));
$db = new DatabaseUser();
if(isset($_GET['valid'])) {
    $user = $db->getUserById($_GET['valid']);
    $user->valid();
    if($user->commit()) {
        $_SESSION['lastMessage'] = Popup::validAccount();
    }
} else if(isset($_GET['unvalid'])) {
    $user = $db->getUserById($_GET['unvalid']);
    $user->unvalid();
    $user->commit();
    $_SESSION['lastMessage'] = Popup::unvalidAccount();
}


$usersOk = new ListUsers($db->getUsersValides());
$usersNotOk = new ListUsers($db->getUsersDisable());
$usersToActivate = new ListUsers($db->getUsersToValid());

include('../views/includes/head.php');
include('../views/admin/members.php');
include('../views/includes/foot.php');

?>
