<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/04/16
 * Time: 23:58
 */

namespace models\forum;
use database\DatabaseUser;
use DateTime;
use models\User;

/**
 * @Entity @Table(name="forum_topic")
 **/
class Topic
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $title;

    /** @Column(type="string") **/
    protected $subtitle;

    /** @Column(type="boolean") */
    protected $locked = false;

    /**
     * @ManyToOne(targetEntity="Forum", inversedBy="topics")
     * @JoinColumn(name="forum_id", referencedColumnName="id")
     */
    protected $forum;

    /**
     * @OneToMany(targetEntity="Post", mappedBy="topic")
     * @OrderBy({"date" = "ASC"})
     */
    protected $posts;

    /** @Column(type="integer") */
    protected $idUser;

    /** @Column(type="datetime") **/
    protected $date;

    /** @Column(type="datetime") **/
    protected $dateUpdate;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return mixed
     */
    public function isLocked()
    {
        return $this->locked;
    }

    /**
     * @param mixed $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * @return mixed
     */
    public function getForum()
    {
        return $this->forum;
    }

    /**
     * @param mixed $forum
     */
    public function setForum($forum)
    {
        $this->forum = $forum;
    }

    /**
     * @return mixed
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param mixed $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

    public function getCreator() {
        $db = new DatabaseUser();
        return $db->getUserById($this->idUser);
    }

    public function setCreator(User $user) {
        $this->idUser = $user->getId();
    }

    public function getDateUpdate() {
        return $this->dateUpdate;
    }

    public function setDateUpdate(DateTime $date) {
        $this->dateUpdate = $date;
    }

    public function setDate(DateTime $date) {
        $this->date = $date;
    }
}