<?php
use utils\Link;
use utils\Rights;

include('../../../begin.php');

if(!isset($_GET['id']) || !isset($_GET['masquer'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("La réponse que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
    $hided = $_GET['masquer'] == 1;
}

$postRepo = $entityManager->getRepository('models\forum\Post');
$post = $postRepo->findOneBy(array('id'=>$id));
if($post == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("La réponse que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

if(Visitor::getInstance()->getUser()->getId() != $post->getUser()->getId() && !Visitor::getInstance()->getUser()->isModerator()) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous n'avez pas le droit d'être ici.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
}

if($hided) {
    if (isset($_POST['msg'])) {
        $post->hide($_POST['msg'], Visitor::getInstance()->getUser(), $entityManager);
        $entityManager->persist($post);
        $entityManager->flush();
        $_SESSION['lastMessage'] = Popup::successMessage("La réponse a bien été " . ($hided ? "cachée" : "affichée de nouveau"));

        header('Location: ' . (Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $post->getTopic()->getId()));
        exit();
    } else {
        $title = 'Masquer un message sur le sujet « ' . $post->getTopic()->getTitle() . ' »';
        $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage() . "/members/index.php"),
            new Link('Forums', Visitor::getRootPage() . '/members/forums/'),
            new Link('Voir le forum « ' . $post->getTopic()->getForum()->getName() . ' »', Visitor::getRootPage() . '/members/forums/voir-forum.php?id=' . $post->getTopic()->getForum()->getId()),
            new Link('Voir le sujet « ' . $post->getTopic()->getTitle() . ' »', Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $post->getTopic()->getId()),
            new Link('Masquer un message', '#')));

        include('../../../views/includes/head.php');
        include('../../../views/members/forums/messages/masquer.php');
        include('../../../views/includes/foot.php');
    }
} else {
    $post->unhide();
    $entityManager->persist($post);
    $entityManager->flush();

    $_SESSION['lastMessage'] = Popup::successMessage("La réponse a bien été " . ($hided ? "cachée" : "affichée de nouveau"));

    header('Location: ' . (Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $post->getTopic()->getId()));
    exit();
}
