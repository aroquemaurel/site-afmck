<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR", "TRESORIER"));

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

    $filename = uniqid()."_".basename($_FILES["file"]["name"]);
    $target_file =  $target_dir.$filename;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    echo $target_file." ".$_FILES['file']["tmp_name"];
    $_SESSION['lastMessage'] = "";
    if(!file_exists($_FILES["file"]["tmp_name"])) {
        $_SESSION['lastMessage'] .= Popup::errorMessage("Un problème a eu lieu dans l'upload du document");
    }
    if ($_FILES["file"]["size"] > 30*1024*1024) { // 30Mio
        $_SESSION['lastMessage'] .= Popup::errorMessage("Votre document est trop gros. Vous pouvez essayer de réduire sa taille, ou de contacter l'administrateur à maintenance@afmck.fr");
    }

    if($imageFileType == "exe" || $imageFileType == "bin" || $imageFileType == "bat") {
        $_SESSION['lastMessage'] .= Popup::errorMessage("Votre document est composé d'une extension invalice. Veuillez contacter l'administrateur à maintenance@afmck.fr");
    }

    if($_SESSION['lastMessage'] == "") {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // TODO add all fields in database
            $document = new Document();
            $document->setTitle($_POST['title']);
            $document->setDate(new DateTime());
            $document->setDescription($_POST['description']);
            $db = new DatabaseDocuments();

            if(!isset($_POST['categoryId']) ||  $_POST['categoryId'] == -1) {
                $idCat = $db->addCategory($categoryName);
            } else {
                $idCat = $_POST['categoryId'];
            }
            $document->setCategory(new \models\Category($idCat));
            $tags = explode(",", $_POST['tags']);
            foreach($tags as $tag) {
                $document->addTag(new Tag(trim($tag)));
            }

            $document->addFile($title, $filename);
            $document->setUser(Visitor::getInstance()->getUser());
            $db->addDocument($document);

            $_SESSION['lastMessage'] = Popup::successMessage("Le document " . $title . "(" . $_FILES["file"]["name"] . ") a été correctement ajouté à la liste de documents consultables par les membres du CA");
        } else {
            $_SESSION['lastMessage'] .= Popup::errorMessage("Un problème a eu lieu dans l'upload du document, celui-ci n'a pas pu être envoyé sur le serveur. Veuillez contacter l'administrateur à maintenance@afmck.fr");
        }
    }
    header('Location: ' . Visitor::getInstance()->getRootPage().'/admin/add-document.php');
} else {
    include('../views/includes/head.php');
    include('../views/admin/add-document.php');
    include('../views/includes/foot.php');
}
?>

