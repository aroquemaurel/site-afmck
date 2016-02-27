<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use utils\Link;
$title = 'Liste des newsletter';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Ajouter une newsletter', '#')));

// Add or edit the news
if(isset($_POST['title']) && isset($_POST['subtitle'])) {
    if(isset($_POST['id'])) {
        $db = new DatabaseNews();
        $news = $db->getById($_POST['id']);
    } else {
        $news = new News();
    }
    $news->setTitle(htmlspecialchars($_POST['title']));
    $news->setSubtitle(htmlspecialchars($_POST['subtitle']));
    $news->setContent($_POST['content']);
    $news->setAuthor(Visitor::getInstance()->getUser());


    // TODO check image uploading
    // Upload image
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        // Loop to get individual element from the array
        $validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
        $ext = explode('.', basename($_FILES['file']['name'][$i]));   // Explode file name from dot(.)
        $file_extension = end($ext); // Store extensions in the variable.
        $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
        $j = $j + 1;      // Increment the number of uploaded images according to the files in array.
        if (($_FILES["file"]["size"][$i] < 100000)     // Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)
        ) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
    // If file moved to uploads folder.
                echo $j . ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {     //  If File Was Not Moved.
                echo $j . ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {     //   If File Size And File Type Was Incorrect.
            echo $j . ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }


    $news->commit();
    $_SESSION['lastMessage'] = Popup::successMessage("La news à bien été ".(isset($_POST['id'])? "modifiée":"ajoutée"));
    header('Location: ' . Visitor::getInstance()->getRootPage().'/admin/list-news.php');
} else {
    include('../views/includes/head.php');
    include('../views/admin/add-news.php');
    include('../views/includes/foot.php');
}
?>

