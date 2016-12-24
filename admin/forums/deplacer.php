<?php
use utils\Link;
use utils\Rights;

include('../../begin.php');


$title = 'Administration des forums';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getInstance()->getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Forums','#')));





$type = $_GET['t'];
$way = $_GET['direction'];
$id = $_GET['id'];

if($type == 'forum') {
    $forumRepo = $entityManager->getRepository('models\forum\Forum');
    $forum = $forumRepo->find($id);
    if($forum != null) {
        if ($way == 'monter') {
            $prevForum = $forumRepo->findOneBy(array("position" => $forum->getPosition()-1, "category"=>$forum->getCategory()->getId()));
            if($prevForum != null) {
                $prevForum->moveDown();
                $forum->moveUp();
                $entityManager->persist($forum);
                $entityManager->persist($prevForum);
                $_SESSION['lastMessage'] = Popup::successMessage("Le forum ".$forum->getName()." est monté d'une place.");
            } else {
                $_SESSION['lastMessage'] = Popup::errorMessage("Une erreur non prévue s'est produite");
                exit();
            }
        } else if ($way == 'descendre') {
            $nextForum = $forumRepo->findOneBy(array("position" => $forum->getPosition()+1));
            if($nextForum != null) {
                $nextForum->moveUp();
                $forum->moveDown();
                $entityManager->persist($forum);
                $entityManager->persist($nextForum);
                $_SESSION['lastMessage'] = Popup::successMessage("Le forum " . $forum->getName() . " est descendu d'une place.");
            }
        } else {
            $_SESSION['lastMessage'] = Popup::errorMessage("Une erreur non prévue s'est produite");
        }
    } else {
        $_SESSION['lastMessage'] = Popup::errorMessage("Le forum n'a pas été trouvé.");
    }

} else if($type == 'category') {
    $catRepo = $entityManager->getRepository('models\forum\Category');
    $category = $catRepo->find($id);
    if($category != null) {
        if ($way == 'monter') {
            $prevCat = $catRepo->findOneBy(array("position" => $category->getPosition()-1));
            if($prevCat != null) {
                $prevCat->moveDown();
                $category->moveUp();
                $entityManager->persist($category);
                $entityManager->persist($prevCat);
                $_SESSION['lastMessage'] = Popup::successMessage("La catégorie " . $category->getName() . " est montée d'une place.");
            } else {
                $_SESSION['lastMessage'] = Popup::errorMessage("Une erreur non prévue s'est produite");
            }
        } else if ($way == 'descendre') {
            $nextCat = $catRepo->findOneBy(array("position" => $category->getPosition()+1));
            if($nextCat != null) {
                $nextCat->moveUp();
                $category->moveDown();
                $entityManager->persist($category);
                $entityManager->persist($nextCat);
                $_SESSION['lastMessage'] = Popup::successMessage("La catégorie " . $category->getName() . " est descendue d'une place.");
            } else {
                $_SESSION['lastMessage'] = Popup::errorMessage("Une erreur non prévue s'est produite");
            }
        }
    } else {
        $_SESSION['lastMessage'] = Popup::errorMessage("La catégorie n'a pas été trouvé.");
    }
}
$entityManager->flush();
header('Location: ' . (Visitor::getRootPage(). '/admin/forums/index.php'));
?>
