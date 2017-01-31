<?php
declare(strict_types = 1);
use models\announces\Announce;
use models\forum\Topic;
use utils\AnnounceHelper;
use utils\Link;

include('../../../begin.php');

if(!isset($_GET['forum'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le forum que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $idForum = $_GET['forum'];
}

$forumRepo = $entityManager->getRepository('models\forum\Forum');
$forum = $forumRepo->findOneBy(array('id'=>$idForum));
if($forum == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Le forum que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

if((isset($_POST['title']) || isset($_POST['announcetitle'])) && isset($_POST['content'])) { // New topic
    $subtitle = isset($_POST['subtitle']) ? htmlspecialchars($_POST['subtitle']) : '';

    if($forum->getName() == FORUM_NAME_ANNOUNCES) {
        // Add announce.
        $announce = new Announce(htmlspecialchars($_POST['announcetitle']));
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
        $entityManager->persist($announce);

        // TODO no duration ?
        $title = AnnounceHelper::getTopicTitleFromAnnounce($announce);
        $subtitle = AnnounceHelper::getTopicSubtitleFromAnnoune($announce);
        $content = AnnounceHelper::getContentPostFromAnnounec($announce);

        $_SESSION['lastMessage'] = Popup::successMessage("Votre annonce a bien été créée");
    } else {
        $title = htmlspecialchars($_POST['title']);
        $content = $_POST['content'];
    }

    $topic = new Topic();
    $date = new DateTime();
    $topic->setDateUpdate($date);
    $topic->setDate($date);
    $topic->setTitle(htmlspecialchars($title));
    $topic->setSubtitle(htmlspecialchars($subtitle));
    $topic->setLocked(false);
    $topic->setForum($forum);
    $topic->setCreator(Visitor::getInstance()->getUser());
    $entityManager->persist($topic);
    $topic->addViewer(Visitor::getInstance()->getUser(), $entityManager);

    $post = new \models\forum\Post();
    $post->setDate($date);
    $post->setUser(Visitor::getInstance()->getUser());
    $post->setContent($content);
    $post->setTopic($topic);

    $entityManager->persist($post);

    $idTopic = $topic->getId();
    if(isset($announce)) {
        $announce->setTopic($topic);
    }
    $_SESSION['lastMessage'] = Popup::successMessage("Votre sujet a bien été créé");

    $entityManager->flush();

    header('Location: ' . (Visitor::getRootPage(). '/members/forums/sujets/voir.php?id='.$idTopic));
    exit();
}
$title = 'Créer un sujet sur le forum « '.$forum->getName().' »';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Forums',Visitor::getRootPage().'/members/forums/'),
    new Link('Voir le forum « '.$forum->getName().' »', Visitor::getRootPage().'/members/forums/voir-forum.php?id='.$forum->getId()),
    new Link('Créer un nouveau sujet', '#')));


include('../../../views/includes/head.php');
include('../../../views/members/forums/sujets/nouveau.php');
include('../../../views/includes/foot.php');
?>
