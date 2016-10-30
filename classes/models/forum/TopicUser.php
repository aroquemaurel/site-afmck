<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 04/04/16
 * Time: 20:52
 */

namespace models\forum;
use database\DatabaseUser;
use models\User;


/**
 * @Entity @Table(name="forum_topic_user")
 **/
class TopicUser
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="integer") */
    protected $idUser;

    /** @Column(type="boolean") */
    protected $isRead = true;

    /** @Column(type="boolean") */
    protected $isNotified = false;

    /** @Column(type="boolean") */
    protected $askUnfollow = false;

    /** @Column(type="boolean") */
    protected $askNotification = false;

    /**
     * @ManyToOne(targetEntity="Topic", inversedBy="usersRead")
     * @JoinColumn(name="topic_id", referencedColumnName="id")
     * */
    protected $topic;


    public function setTopic($topic) {
        $this->topic = $topic;
    }

    public function setUser(User $user) {
        $this->idUser = $user->getId();
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function getUser() {
        $db = new DatabaseUser();
        return $db->getUserById($this->idUser);
    }

    public function setRead($read) {
        $this->isRead = $read;
    }

    public function hasRead() {
        return $this->isRead;
    }

    /**
     * @return mixed
     */
    public function isNotified()
    {
        return $this->isNotified;
    }

    /**
     * @param mixed $isNotified
     */
    public function setNotified($isNotified)
    {
        $this->isNotified = $isNotified;
    }

    /**
     * @param mixed $askUnfollow
     */
    public function setAskUnfollow($askUnfollow)
    {
        $this->askUnfollow = $askUnfollow;
    }



    /**
     * @return mixed
     */
    public function askUnfollow()
    {
        return $this->askUnfollow;
    }

    /**
     * @return mixed
     */
    public function getAskNotification()
    {
        return $this->askNotification;
    }

    /**
     * @param mixed $askNotification
     */
    public function setAskNotification($askNotification)
    {
        $this->askNotification = $askNotification;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }





}