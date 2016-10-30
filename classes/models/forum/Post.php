<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/04/16
 * Time: 23:58
 */

namespace models\forum;
use database\DatabaseUser;
use models\User;

/**
 * @Entity(repositoryClass="database\repository\PostRepository")
 * @Table(name="forum_post")
 **/
class Post
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @ManyToOne(targetEntity="Topic", inversedBy="posts")
     * @JoinColumn(name="topic_id", referencedColumnName="id")
     */
    protected $topic;


    /** @Column(type="text") **/
    protected $content;

    /** @Column(type="datetime") **/
    protected $date;

    /** @Column(type="integer") */
    protected $idUser;

    /**
     * @OneToOne(targetEntity="Message", inversedBy="post")
     * @JoinColumn(name="isHided", referencedColumnName="id")
     */
    protected $isHided = null;

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
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getUser() {
        $db = new DatabaseUser();
        return $db->getUserById($this->idUser);
    }

    public function setUser(User $u) {
        $this->idUser = $u->getId();
    }

    public function isHided() {
        return $this->isHided != null;
    }

    public function messageHided() {
        if($this->isHided()) {
            return $this->isHided;
        } else {
            return null;
        }
    }

    public function hide($msg, User $u, $entityManager) {
        $message = new Message();
        $message->setMessage($msg);
        $message->setUser($u->getId());
        $entityManager->persist($message);
        $entityManager->flush();
        $this->isHided = $message;
    }

    public function unhide() {
        $this->isHided = null;
    }

}