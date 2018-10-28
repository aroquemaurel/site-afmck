<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use database\DatabaseNews;
use utils\Link;
$title = 'Editer la news';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Editer une newsletter', '#')));

// Edit the news
if(isset($_GET['id'])) {
    $db = new DatabaseNews();
    $news = $db->removeById($_GET['id']);

}
header('Location: ' . Visitor::getRootPage().'/admin/list-news.php');
?>

