<?php
use utils\Link;
use utils\Rights;

include('../../../begin.php');

if(!isset($_GET['id']) || !isset($_GET['suivre'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
    $follow = $_GET['suivre'] == 1;
}


$topicRepo = $entityManager->getRepository('models\forum\Topic');
$topic = $topicRepo->findOneBy(array('id'=>$id));
if($topic == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

if($follow) {
    $topic->addFollower(Visitor::getInstance()->getUser());
} else {
    $topic->removeFollower(Visitor::getInstance()->getUser());
}

$entityManager->persist($topic);
$entityManager->flush();
$_SESSION['lastMessage'] = Popup::successMessage("Le sujet est correctement ".($hided ? "suivi" : "supprimé des sujets suivis"));

header('Location: ' . (Visitor::getRootPage(). '/members/forums/sujets/voir.php?id='.$id));
exit();
