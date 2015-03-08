<?php
include('../begin.php');

use utils\Link;
$title = 'Validation de signature de la charte';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Validation de la charte', '#')));
$db = new DatabaseUser();

if(isset($_GET['valid'])) {
    $user = $db->getUserById($_GET['valid']);
    $user->setHasSigned(true);
    if($user->commit()) {
        //$_SESSION['lastMessage'] = Popup::validAccount(); // TODO
    }
} /*else if(isset($_GET['unvalid'])) {
    $user = $db->getUserById($_GET['unvalid']);
    $user->unvalid();
    $user->commit();
    $_SESSION['lastMessage'] = Popup::unvalidAccount();
}*/

$users = $db->getUsersSigned(false);
include('../views/includes/head.php');
include('../views/admin/valider-signature-charte.php');
include('../views/includes/foot.php');
?>
