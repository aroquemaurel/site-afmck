<?php
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use utils\Link;
$title = 'Liste des newsletter';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Ajouter une newsletter', '#')));

// Add or edit the news
if(isset($_POST['title']) && isset($_POST['subtitle'])) {
    $news = new News();
    $news->setTitle(htmlspecialchars($_POST['title']));
    $news->setSubtitle(htmlspecialchars($_POST['subtitle']));
    $news->setContent($_POST['content']);
    $news->setAuthor(Visitor::getInstance()->getUser());
    $news->commit();
    $_SESSION['lastMessage'] = Popup::successMessage("La news à bien été ajoutée");
    header('Location: ' . Visitor::getInstance()->getRootPage().'/admin/list-news.php');
} else {
    include('../views/includes/head.php');
    include('../views/admin/add-news.php');
    include('../views/includes/foot.php');
}
?>

