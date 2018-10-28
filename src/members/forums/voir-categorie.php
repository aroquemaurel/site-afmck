<?php
use utils\Link;
use utils\Rights;

include('../../begin.php');


if(!isset($_GET['id'])) {
    $_SESSION['lastMessage'] = Popup::errorMessage("La catégorie que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
    exit();
} else {
    $id = $_GET['id'];
}


$categoryRepo = Visitor::getEntityManager()->getRepository('models\forum\Category');
$category = $categoryRepo->findOneBy(array('id'=>$id));
if($category == null) {
    $_SESSION['lastMessage'] = Popup::errorMessage("La catégorie que vous recherchiez n'existe pas.");
    header('Location: ' . (Visitor::getRootPage(). '/members/forums/index.php'));
}

$title = 'Voir la catégorie « '.$category->getName().' »';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Forums',Visitor::getRootPage().'/members/forums/'), new Link($category->getName(), '#')));

$forums = $category->getForums();


include('../../views/includes/head.php');
include('../../views/members/forums/voir-category.php');
include('../../views/includes/foot.php');
?>
