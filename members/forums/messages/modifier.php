<?php
use models\forum\Post;
use utils\Link;
use utils\Rights;

include('../../../begin.php');

if(!isset($_GET['id'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le message que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
}

$postRepo = $entityManager->getRepository('models\forum\Post');
$post = $postRepo->findOneBy(array('id'=>$id));
if($post == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le message que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
}

if((Visitor::getInstance()->getUser()->getId() != $post->getUser()->getId() &&
    !Visitor::getInstance()->getUser()->isModerator()) ||
    ($post->getTopic()->isLocked() && !Visitor::getInstance()->getUser()->isModerator())
) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous n'avez pas le droit d'être ici.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
}

if(isset($_POST['content'])) {
    // We edit the new post
    $post->setContent($_POST['content']);
    if($post->getTopic()->getCreator()->getId() == Visitor::getInstance()->getUser()->getId()) {
        if(isset($_POST['title'])) {
            $post->getTopic()->setTitle($_POST['title']);
        }

        if(isset($_POST['subtitle'])) {
            $post->getTopic()->setSubtitle($_POST['subtitle']);
        }
    }
    $entityManager->persist($post);
    $entityManager->flush();
    $_SESSION['lastMessage'] = Popup::successMessage("Vous avez bien modifier le sujet.");
    header('Location: ' . (Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $post->getTopic()->getId()));
    exit();
} else {
    $title = 'Modifier un message sur le sujet « '.$post->getTopic()->getTitle().' »';
    $breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
        new Link('Forums',Visitor::getRootPage().'/members/forums/'),
        new Link('Voir le forum « '.$post->getTopic()->getForum()->getName().' »', Visitor::getRootPage().'/members/forums/voir-forum.php?id='.$post->getTopic()->getForum()->getId()),
        new Link('Créer un nouveau sujet', '#')));

    include('../../../views/includes/head.php');
    include('../../../views/members/forums/messages/modifier.php');
    include('../../../views/includes/foot.php');
}
?>
