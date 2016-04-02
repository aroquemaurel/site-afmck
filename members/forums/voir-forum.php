<?php
use utils\Link;
use utils\Rights;

include('../../begin.php');


if(!isset($_GET['id'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le forum que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
}


$forumRepo = $entityManager->getRepository('models\forum\Forum');
$forum = $forumRepo->findOneBy(array('id'=>$id));
if($forum == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le forum que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

$title = 'Voir le forum « '.$forum->getName().' »';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Forums',Visitor::getRootPage().'/members/forums/'), new Link('Voir le forum « '.$forum->getName().' »', '#')));




include('../../views/includes/head.php');
include('../../views/members/forums/voir-forum.php');
include('../../views/includes/foot.php');
?>
