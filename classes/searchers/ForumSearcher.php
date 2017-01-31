<?php
declare(strict_types = 1);

namespace searchers;
use Doctrine\ORM\Query\ResultSetMapping;
use Visitor;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 24/12/16
 * Time: 11:10
 */
class ForumSearcher extends AbstractSearcher
{
    public function search(string $search) : array
    {
        $qb = Visitor::getEntityManager()->createQueryBuilder();
        $qb
            ->select('p', 't')
            ->from('models\forum\Post', 'p')
            ->leftJoin('p.topic', 't')
            ->where('t.title LIKE :search')
            ->orWhere('t.subtitle LIKE :search')
            ->orWhere('p.content LIKE :search')
            ->setParameter('search', '%'.$search.'%');

        return $qb->getQuery()->getResult();
    }
}