<?php
use utils\Link;
use utils\Rights;

include('../../../begin.php');

if(!isset($_GET['id'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("La réponse que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
}

$postRepo = $entityManager->getRepository('models\forum\Post');
$post = $postRepo->findOneBy(array('id'=>$id));
if($post == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("La réponse que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

if($post->hasVote(Visitor::getInstance()->getUser())) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous avez déjà voté pour ce message.");
} else {
    $post->disagree(Visitor::getInstance()->getUser());
    $_SESSION['lastMessage'] = Popup::successMessage("La réponse a bien été désapprouvée");
}

header('Location: ' . (Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $post->getTopic()->getId()));
exit();
