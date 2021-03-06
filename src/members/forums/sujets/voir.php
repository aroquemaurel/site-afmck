<?php
use models\forum\TopicUser;
use utils\Link;
use utils\Rights;

include('../../../begin.php');

if(!isset($_GET['id'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
}

$topicRepo = $entityManager->getRepository('models\forum\Topic');

$topic = $topicRepo->findOneBy(array('id'=>$id));
if($topic == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
}

$forum = $topic->getForum();
if(!$forum->hasRights(Visitor::getInstance()->getUser())) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous n'avez pas le droit d'être ici");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
}
$currentPage = isset($_GET['p']) && is_numeric($_GET['p']) ? $_GET['p'] : 1;
$title = 'Voir le sujet « '.$topic->getTitle().' »';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Forums',Visitor::getRootPage().'/members/forums/'),
    new Link($forum->getCategory()->getName(), Visitor::getRootPage().'/members/forums/voir-categorie.php?id='.$forum->getCategory()->getId()),
    new Link($forum->getName(), Visitor::getRootPage().'/members/forums/voir-forum.php?id='.$forum->getId()),
    new Link($topic->getTitle(), '#')));

$topic->addViewer(Visitor::getInstance()->getUser(), $entityManager);

include('../../../views/includes/head.php');
include('../../../views/members/forums/sujets/voir.php');
include('../../../views/includes/foot.php');
?>
