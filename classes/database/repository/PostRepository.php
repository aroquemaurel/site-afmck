<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 17/04/16
 * Time: 22:31
 */

namespace database\repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use models\forum\Forum;
use models\forum\Topic;

class PostRepository extends EntityRepository
{
    public function getPosts(Topic $topic, $first_result, $max_results = FORUM_NB_POSTS_TOPIC)
    {
        $qb = $this->createQueryBuilder('posts');
        $qb
            ->select('posts', 'topic')
            ->join('posts.topic', 'topic')
            ->where('topic.id=:topic')
            ->orderBy('topic.date', 'ASC')
            ->setFirstResult($first_result)
            ->setMaxResults($max_results)
            ->setParameter(':topic', $topic->getId());

        $pag = new Paginator($qb);
        return $pag;
    }

    public function getNbPosts(Forum $forum) {
        $qb = $this->createQueryBuilder('posts');
        $ids = array();
        foreach($forum->getTopics() as $t) {
            $ids[] = $t->getId();
        }
        $qb
            ->select('posts', 'topic')
            ->join('posts.topic', 'topic')
            ->where('topic.id IN(:topics)')
            ->setParameter(':topics', $ids);

        return count($qb->getQuery()->getArrayResult());
    }

    public function getLastPost(Topic $topic)
    {
        $qb = $this->createQueryBuilder('posts');
        $qb
            ->select('posts', 'topic')
            ->join('posts.topic', 'topic')
            ->where('topic.id=:topic')
            ->orderBy('posts.date', 'DESC')
            ->setMaxResults(1)
            ->setParameter(':topic', $topic->getId());

        $pag = new Paginator($qb);
        return $pag->getIterator()->getArrayCopy()[0];
    }


}