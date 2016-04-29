<?php
namespace models\forum;
use models\User;

/**
 * @Entity @Table(name="forum_forum")
 **/
class Forum
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $name;

    /**
     * @ManyToOne(targetEntity="Category", inversedBy="forums")
     * @JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /** @Column(type="string") **/
    protected $description;

    /** @Column(type="integer") **/
    protected $order;
    /**
     * @OneToMany(targetEntity="Topic", mappedBy="forum")
     * @OrderBy({"dateUpdate" = "DESC"})
     */
    protected $topics;

    /**
     * @OneToMany(targetEntity="RightForum", mappedBy="forum")
     */
    protected $rights;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTopics($offset, $em) {
        $topicsRepo = $em->getRepository('models\forum\Topic');
        return $topicsRepo->getTopics($this, $offset);
    }

    public function getAllTopics() {
        return $this->topics;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function hasRead(User $u)
    {
        foreach ($this->topics as $topic) {
            if (!$topic->hasRead($u)) {
                return false;
            }
        }

        return true;
    }

    public function getNbPosts($em) {
        $postsRepo = $em->getRepository('models\forum\Post');
        return $postsRepo->getNbPosts($this);
    }

    public function getLastPost($em) {
        $ret = null;

        foreach($this->topics as $t) {
            $lastPost = $t->getLastPost($em);
            if($ret == null || strtotime($lastPost->getDate()->format("Y-m-d H:i:s")) > strtotime($ret->getDate()->format("Y-m-d H:i:s"))) {
                $ret = $t->getLastPost($em);
            }
        }

        return $ret;
    }

    public function hasRights(User $u) {
        foreach($this->rights as $right) {
            if($u->isInGroup($right->getGroupName())) {
                return true;
            }
        }

        return count($this->rights) == 0;
    }

}
