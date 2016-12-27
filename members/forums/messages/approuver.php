<?php
declare(strict_types = 1);

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

// TODO if user already approved.

$post->agree(Visitor::getInstance()->getUser());

$_SESSION['lastMessage'] = Popup::successMessage("La réponse a bien été approuvée");

header('Location: ' . (Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $post->getTopic()->getId()));
exit();
