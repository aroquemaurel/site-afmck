<?php
declare(strict_types = 1);

namespace searchers;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 24/12/16
 * Time: 11:10
 */
class ForumSearcher extends AbstractSearcher
{
    private $topicRepo;
    public function __construct()
    {
        $this->topicRepo = \Visitor::getEntityManager()->getRepository('models\forum\Topic');
    }

    public function search(string $search) : array
    {
        $ret = array();
        // TODO: How to use 'like' ?
        $ret['topics'] = $this->topicRepo->findBy(array("title" => $search));
        // TODO better search : currently, it smell shit.

        return $ret;
    }
}