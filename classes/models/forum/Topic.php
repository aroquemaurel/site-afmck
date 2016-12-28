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
use Visitor;

/**
 * @Entity(repositoryClass="database\repository\TopicRepository")
 * @Table(name="forum_topic", indexes={@Index(columns={"title", "subtitle"}, flags={"fulltext"})})
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
     * @OneToMany(targetEntity="TopicUser", mappedBy="topic")
     * @OrderBy({"idUser" = "ASC"})
     */
    protected $usersRead;

    /** @Column(type="boolean") **/
    protected $isHided = false;

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
    public function getPosts($offset, $em)
    {
        $postsRepo = $em->getRepository('models\forum\Post');
        return $postsRepo->getPosts($this, $offset);
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

    public function getDate() {
        return $this->date;
    }

    public function addViewer(User $user, $entityManager)
    {
        if($this->usersRead != null) {
            foreach($this->usersRead as $topicUser) {
                if($user->getId() == $topicUser->getIdUser()) {
                    $topicUser->setRead(true);
                    $topicUser->setNotified(false);
                    $entityManager->persist($topicUser);
                    $entityManager->flush();
                    return;
                }
            }
        }
        $topicUser = new TopicUser();
        $topicUser->setUser($user);
        $topicUser->setTopic($this);
        $topicUser->setRead(true);
        $topicUser->setNotified(true);

        $entityManager->persist($topicUser);
        $entityManager->flush();
    }

    public function removeAllViewers($entityManager) {

        foreach($this->usersRead as $topicUser) {
            $topicUser->setRead(false);
            $entityManager->persist($topicUser);
        }
        $entityManager->flush();
    }

    public function hasRead(User $pUser) {
        foreach($this->usersRead as $u) {
            if($u->getIdUser() == $pUser->getId()) {
                return $u->hasRead();
            }
        }

        return false;
    }

    public function isNew(User $user) {
        foreach($this->usersRead as $u) {
            if($u->getIdUser() == $user->getId()) {
                return false;
            }
        }
        return true;
    }

    public function isHided() {
        return $this->isHided;
    }

    public function hide() {
        $this->isHided = true;
    }

    public function unhide() {
        $this->isHided = false;
    }

    public function getFirstPost($em) {
        $posts = $this->getPosts(0, $em);
        return $posts->getIterator()->getArrayCopy()[0];
    }

    public function getLastPost($em) {
        $postsRepo = $em->getRepository('models\forum\Post');
        return $postsRepo->getLastPost($this);

    }

    public function getNbPosts($em) {
        return $this->getPosts(0, $em)->count();
    }

    public function isFollowedBy(User $u) {
        foreach($this->usersRead as $uread) {
            if($uread->getIdUser() == $u->getId()) {
                return $uread->getAskNotification();
            }
        }
        return false;
    }

    public function addFollower(User $u) {
        foreach($this->usersRead as $uread) {
            if($uread->getIdUser() == $u->getId()) {
                $uread->setAskNotification(true);
            }
        }
    }

    public function removeFollower(User $u) {
        foreach($this->usersRead as $uread) {
            if($uread->getIdUser() == $u->getId()) {
                $uread->setAskNotification(false);
                $uread->setAskUnfollow(true);
            }
        }
    }

    public function askUnfollow(User $u) {
        foreach($this->usersRead as $uread) {
            if($uread->getIdUser() == $u->getId()) {
                return $uread->askUnfollow();
            }
        }

        return false;
    }
}
