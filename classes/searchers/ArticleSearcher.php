<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 08/01/17
 * Time: 21:59
 */

namespace searchers;


use Visitor;

class ArticleSearcher extends AbstractSearcher
{
    /**
     * ArticleSearcher constructor.
     */
    public function __construct()
    {
    }


    public function search(string $search) : array
    {
        $qb = Visitor::getEntityManager()->createQueryBuilder();
        $qb
            ->select('ka', 'a', 'k')
            ->from('models\articles\KeywordArticle', 'ka')
            ->leftJoin('ka.article', 'a')
            ->leftJoin('ka.keyword', 'k')
            ->where('k.name LIKE :search')
            ->orWhere('a.title LIKE :search')
            ->setParameter('search', '%'.$search.'%');
            
        return $qb->getQuery()->getResult();

    }
}