<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 08/01/17
 * Time: 21:59
 */

namespace searchers;


class ArticleSearcher extends AbstractSearcher
{
    private $articleRepo;

    /**
     * ArticleSearcher constructor.
     */
    public function __construct()
    {
        $this->articleRepo = \Visitor::getEntityManager()->getRepository('models\article\Article');
    }


    public function search(string $search) : array
    {
        // TODO: Implement search() method.
    }
}