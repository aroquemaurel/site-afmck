<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use utils\Link;
$title = 'Editer la news';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Editer une newsletter', '#')));

// Edit the news
if(isset($_GET['id'])) {
    $db = new DatabaseNews();
    $news = $db->getById($_GET['id']);
    include('../views/includes/head.php');
    include('../views/admin/add-news.php');
    include('../views/includes/foot.php');
} else {
    header('Location: ' . Visitor::getInstance()->getRootPage().'/admin/list-news.php');
}
?>

