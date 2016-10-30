<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 17/04/16
 * Time: 22:11
 */

namespace database\repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use models\forum\Forum;

class TopicRepository extends EntityRepository
{
    public function getTopics(Forum $forum, $first_result, $max_results = FORUM_NB_TOPIC_FORUM)
    {
        $qb = $this->createQueryBuilder('topics');
        $qb
            ->select('topics', 'forum')
            ->join('topics.forum', 'forum')
            ->where('forum.id=:forum')
            ->orderBy('topics.dateUpdate', 'DESC')
            ->setFirstResult($first_result)
            ->setMaxResults($max_results)
            ->setParameter(':forum', $forum->getId());

        $pag = new Paginator($qb);
        return $pag;
    }
}
