<?php
use utils\Link;
use utils\Rights;

include('../../../begin.php');

if(!isset($_GET['id']) || !isset($_GET['verrouiller'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
    $locked = $_GET['verrouiller'] == 1;
}

if(!Visitor::getInstance()->getUser()->isModerator()) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous n'avez pas le droit d'être ici.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
}

$topicRepo = $entityManager->getRepository('models\forum\Topic');
$topic = $topicRepo->findOneBy(array('id'=>$id));
if($topic == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

$topic->setLocked($locked);
$entityManager->persist($topic);
$entityManager->flush();
$_SESSION['lastMessage'] = Popup::successMessage("Le sujet a bien été ".($locked ? "verrouillé" : "déverrouillé"));

header('Location: ' . (Visitor::getRootPage(). '/members/forums/sujets/voir.php?id='.$id));
exit();
