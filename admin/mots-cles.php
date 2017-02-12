<?php
$particularRights = true;
include('../begin.php');
utils\Rights::hasRights(array("SECRETAIRE", "ADMINISTRATEUR"));

use database\DatabaseNews;
use models\articles\Article;
use models\articles\Keyword;
use utils\Link;
$title = 'Gestion de mots clés';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Espace membres', Visitor::getRootPage()."/members/index.php"),
    new Link('Administration','#'), new Link('Gestion des mots clés', '#')));

//$page = isset($_GET['p']) ? $_GET['p'] : 1;
//$news = (new DatabaseNews())->getAllNews($page, 12);
//$nbPages = round(((new DatabaseNews())->getNbNews()+1)/12, 0, PHP_ROUND_HALF_UP);
$repo = Article::getRepository();
$articles = $repo->findBy(array("notIndexed" => false), array("path" => "asc"));

if(isset($_POST['articles'])) { // We are posting changes
    $allKeywords = array();
    foreach(Keyword::getRepository()->findAll() as $k) {
        $allKeywords[$k->getName()] = $k;
    }
    foreach($articles as $article) {
        $articleName = 'article_'.$article->getId();
        if(isset($_POST[$articleName])) {
            $article->removeKeywords();
            $keywords = explode(', ', $_POST[$articleName]);
            foreach($keywords as $k) {
                if($k == '') {
                    continue;
                }
                if(!isset($allKeywords[$k])) {
                    // TODO new keyword here
                    echo $k;
                    $newK = new Keyword($k);
                    Visitor::getEntityManager()->persist($newK);
                    $allKeywords[$k] = $newK;
                }
                $article->addKeyword($allKeywords[$k]);
            }
            Visitor::getEntityManager()->persist($article);
        }
    }
    Visitor::getEntityManager()->flush();
    header('Location: '.Visitor::getRootPage().'/admin/mots-cles.php');
}


include('../views/includes/head.php');
include('../views/admin/mots-cles.php');
include('../views/includes/foot.php');

?>

