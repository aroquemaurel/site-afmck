<?php
use models\forum\Post;
use utils\Link;
use utils\Rights;

include('../../../begin.php');

if(!isset($_POST['idTopic'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_POST['idTopic'];
}

$topicRepo = $entityManager->getRepository('models\forum\Topic');
$topic = $topicRepo->findOneBy(array('id'=>$id));
if($topic == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le sujet que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

// We add the new post
$post = new Post();
$now = new DateTime();
$post->setDate($now);
$post->setTopic($topic);
$post->setContent($_POST['content']);
$post->setUser(Visitor::getInstance()->getUser());

$topic->setDateUpdate($now);
$entityManager->persist($topic);
$entityManager->persist($post);
$entityManager->flush();
$_SESSION['lastMessage'] = Popup::successMessage("Vous avez bien répondu au sujet.");
header('Location: ' . (Visitor::getRootPage(). '/members/forums/sujets/voir.php?id='.$id));
exit();
?>
