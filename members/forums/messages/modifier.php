<?php
use models\forum\Post;
use utils\AnnounceHelper;
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

if($post->getTopic()->getForum()->getName() == FORUM_NAME_ANNOUNCES) {
    $announceRepo = $entityManager->getRepository('models\announces\Announce');
    $announce = $announceRepo->findOneBy(array('topic'=>$post->getTopic()));
    $post->setContent($announce->getDescription());
}

if(isset($_POST['content']) && isset($post)) {
    if(isset($announce) && isset($_POST['announcetitle']) && isset($_POST['town']) && isset($_POST['postalCode']) && isset($_POST['date'])) {
        // We edit the associate announce
        $announce->setDate(new DateTime($_POST['date']));
        $announce->setDuration($_POST['duration']);
        $announce->setPostalCode($_POST['postalCode']);
        $announce->setTown($_POST['town']);
        $announce->setTitle(htmlspecialchars($_POST['announcetitle']));
        $announceTypeRepo = $entityManager->getRepository('models\announces\TypeAnnounce');
        $announceType = $announceTypeRepo->findOneBy(array('id'=>$_POST['announceType']));
        $announce->setType($announceType);
        $announce->setUser(Visitor::getInstance()->getUser());
        $announce->setDescription($_POST['content']);

        $title = AnnounceHelper::getTopicTitleFromAnnounce($announce);
        $subtitle = AnnounceHelper::getTopicSubtitleFromAnnoune($announce);
        $content = AnnounceHelper::getContentPostFromAnnounec($announce);

        $entityManager->persist($announce);
    } else { // Only a post
        $content = $_POST['content'];
        $title = htmlspecialchars($_POST['title']);
        $subtitle = isset($_POST['subtitle']) ? htmlspecialchars($_POST['subtitle']) : '';
    }

    // We edit the new post
    $post->setContent($content);
    $topic = $post->getTopic();
    if($topic->getCreator()->getId() == Visitor::getInstance()->getUser()->getId()) {
        $topic->setTitle($title);
        $topic->setSubtitle($subtitle);
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
