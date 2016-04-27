<?php
use models\forum\Post;
use models\forum\TopicUser;
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

$lastPost = $topic->getLastPost($entityManager); 
$now = new DateTime();
if($lastPost->getUser()->getId() == Visitor::getInstance()->getUser()->getId()) { // Same user
    $offset = strtotime($now->format("Y-m-d H:i:s")) - strtotime($lastPost->getDate()->format("Y-m-d H:i:s"));
    if($offset < 60) {
        $_SESSION['lastMessage'] = Popup::errorMessage("Vous avez déjà répondu il y a moins d'une minute à ce sujet. Merci de modifier votre message précédent afin d'éviter le spam.");
        header('Location: ' . (Visitor::getRootPage(). '/members/forums/sujets/voir.php?id='.$id));
        exit();
    }
}
// We add the new post
$post = new Post();

$post->setDate($now);
$post->setTopic($topic);
$post->setContent($_POST['content']);
$post->setUser(Visitor::getInstance()->getUser());

$topic->setDateUpdate($now);

$topic->removeAllViewers($entityManager);
if(!$topic->askUnfollow(Visitor::getInstance()->getUser())) {
    $topic->addFollower(Visitor::getInstance()->getUser());
}
$topic->addViewer(Visitor::getInstance()->getUser(), $entityManager);

// TODO if we don't want notification… :/

$entityManager->persist($post);
$entityManager->flush();
$_SESSION['lastMessage'] = Popup::successMessage("Vous avez bien répondu au sujet.");
header('Location: ' . (Visitor::getRootPage(). '/members/forums/sujets/voir.php?id='.$id));
exit();
?>
