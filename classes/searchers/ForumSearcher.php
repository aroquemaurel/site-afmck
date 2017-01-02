<?php
declare(strict_types = 1);

namespace searchers;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 24/12/16
 * Time: 11:10
 */
class ForumSearcher extends AbstractSearcher
{
    private $topicRepo;
    private $postRepo;

    public function __construct()
    {
        $this->topicRepo = \Visitor::getEntityManager()->getRepository('models\forum\Topic');
        $this->postRepo = \Visitor::getEntityManager()->getRepository('models\forum\Post');
    }

    public function search(string $search) : array
    {
        // search topics by title/subtitle
        $query = $this->topicRepo->createQueryBuilder('a')
            ->where('a.title LIKE :title')
            ->orWhere('a.subtitle LIKE :subtitle')
            ->setParameter('title', '%'.$search.'%')
            ->setParameter('subtitle', '%'.$search.'%')
            ->getQuery();
        $ret['topics'] = $query->getResult();

        // search topics by post content
        $query = $this->postRepo->createQueryBuilder('a')
            ->where('a.content LIKE :content')
            ->setParameter('content', '%'.$search.'%')
            ->getQuery();
        $ret['posts'] = $query->getResult();

        return $ret;
    }
}