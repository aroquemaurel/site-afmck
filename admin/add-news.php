<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use database\DatabaseNews;
use models\File;
use models\News;
use utils\Link;
$title = 'Liste des newsletter';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Ajouter une newsletter', '#')));

// Add or edit the news
if(isset($_POST['title']) && isset($_POST['subtitle'])) {
    if (isset($_POST['id'])) {
        $db = new DatabaseNews();
        $news = $db->getById($_POST['id']);
    } else {
        $news = new News();
    }
    $news->setTitle(htmlspecialchars($_POST['title']));
    $news->setSubtitle(htmlspecialchars($_POST['subtitle']));
    $news->setContent($_POST['content']);
    $news->setAuthor(Visitor::getInstance()->getUser());

    $target_dir = Visitor::getInstance()->getRootPath() . "/docs/members/news";
    $err = false;
        $all_files = array();
    if(isset($_FILES['file']['tmp_name'][0]) && $_FILES['file']['tmp_name'][0] != "") {
        $uploader = new Uploader($target_dir, array("pdf", "jpg", "png", "doc", "docx", "odt", "xls", "xlsx", "jpeg"), 4 * 1024 * 1024*1024);



        // Upload image
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $filename = $uploader->upload($_FILES['file']['name'][$i], $_FILES['file']['tmp_name'][$i], $_FILES['file']['size'][$i]);
            if ($filename == null) {
                $err = true;
                break;
            } else {
                $buff = array();
                $buff['path'] = $filename;
                $buff['title'] = $_FILES['file']['name'][$i];
                $all_files[] = $buff;
            }
        }
    }
    if (!$err) {
        $news->commit();

        foreach($all_files as $file) {
            $file = new File($file['title'], $file['path']);
            $db = new DatabaseNews();
            $db->addFile($file, $news->getId());
        }

        $_SESSION['lastMessage'] = Popup::successMessage("La news à bien été " . (isset($_POST['id']) ? "modifiée" : "ajoutée"));
    }
    header('Location: ' . Visitor::getInstance()->getRootPage().'/admin/list-news.php');
} else {
    include('../views/includes/head.php');
    include('../views/admin/add-news.php');
    include('../views/includes/foot.php');
}
?>

