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

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTopics() {
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

    public function getNbPosts() {
        $ret = 0;
        foreach($this->topics as $topic) {
            $ret += count($topic->getPosts());
        }
        return $ret;
    }

}