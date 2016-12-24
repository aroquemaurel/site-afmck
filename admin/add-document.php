<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR", "TRESORIER"));

use database\DatabaseDocuments;
use models\Document;
use models\Tag;
use utils\Link;
$title = 'Liste des newsletter';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Ajouter un document', '#')));
$categories = (new DatabaseDocuments())->getAllCategoriesName();
// Add or edit the document
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['tags'])) {
    $title = $_POST['title'];
    $categoryName = $_POST['category'];
    $description = $_POST['description'];

    $target_dir = Visitor::getInstance()->getRootPath()."/docs/CA/";

    $uploader = new Uploader($target_dir, array("pdf", "jpg", "png", "doc", "docx", "odt", "xls", "xlsx", "jpeg"), 30*1024*1024);
    $filename = $uploader->upload($_FILES["file"]["name"], $_FILES["file"]["tmp_name"], $_FILES["file"]["size"]);
    if($filename != null) {
        $document = new Document();
        $document->setTitle($_POST['title']);
        $document->setDate(new DateTime());
        $document->setDescription($_POST['description']);
        $db = new DatabaseDocuments();

        if (!isset($_POST['categoryId']) || $_POST['categoryId'] == -1) {
            $idCat = $db->addCategory($categoryName);
        } else {
            $idCat = $_POST['categoryId'];
        }
        $document->setCategory(new \models\Category($idCat));
        $tags = explode(",", $_POST['tags']);
        foreach ($tags as $tag) {
            $document->addTag(new Tag(trim($tag)));
        }

        $document->addFile($title, $filename);
        $document->setUser(Visitor::getInstance()->getUser());
        $db->addDocument($document);

        $_SESSION['lastMessage'] = Popup::successMessage("Le document " . $title . "(" . $_FILES["file"]["name"] . ") a été correctement ajouté à la liste de documents consultables par les membres du CA");
    } else {
        $_SESSION['lastMessage'] .= Popup::errorMessage("Une erreur à eu lieu lors de l'upload du document.");
    }

    header('Location: ' . Visitor::getInstance()->getRootPage().'/admin/add-document.php');
} else {
    include('../views/includes/head.php');
    include('../views/admin/add-document.php');
    include('../views/includes/foot.php');
}
?>

