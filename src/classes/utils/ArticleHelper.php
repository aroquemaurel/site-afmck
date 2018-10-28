<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 08/01/17
 * Time: 11:48
 */

namespace utils;


use models\articles\Article;
use utils\UrlHelper;
use Visitor;

class ArticleHelper
{
    public static function updateArticleDatabase($title, $url) {
        $repo = Visitor::getEntityManager()->getRepository('models\articles\Article');
        $article = $repo->findOneBy(array("title" => $title));

        $path = UrlHelper::getCurrentPath();

        if ($article == null) { // Create a new article
            if (isset($split[1])) {
                $article = new Article($title, $path);
                Visitor::getEntityManager()->persist($article);
                Visitor::getEntityManager()->flush();
            }
        } else {
            if ($article->getPath() != $path) { // update the existing article
                $article->setPath($path);
                Visitor::getEntityManager()->persist($article);
                Visitor::getEntityManager()->flush();
            }
        }

    }
}
