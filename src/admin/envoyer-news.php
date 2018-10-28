<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use database\DatabaseNews;
use database\DatabaseUser;
use utils\Link;
$title = 'Envoyer la news';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Envoyer une newsletter', '#')));

// Edit the news
if(isset($_GET['id'])) {
    $db = new DatabaseNews();
    $news = $db->getById($_GET['id']);
    $usersValides = (new DatabaseUser())->getUsersValides();
    $users = array();

    $toSend = isset($_GET['send']) && $_GET['send'] == 1;
    foreach ($usersValides as $u) {
        if ($u->getNewsletter()) {
            $users[] = $u;
            if ($toSend) {
                $u->addNewsToSend($news);
            }
        }
    }


    if (!$toSend) {
        include('../views/includes/head.php');
        include('../views/admin/envoyer-news.php');
        include('../views/includes/foot.php');
    } else {
        header('Location: ' . Visitor::getRootPage().'/admin/list-news.php');
    }
} else {
    header('Location: ' . Visitor::getRootPage().'/admin/list-news.php');
}
?>

