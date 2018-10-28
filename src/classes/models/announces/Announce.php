<?php

namespace models\announces;


/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 09/01/17
 * Time: 23:24
 */
use database\DatabaseUser;
use models\User;

/**
 * @Entity
 * @Table(name="announces_announce")
 **/
class Announce
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $title;

    /**
     * @ManyToOne(targetEntity="TypeAnnounce", inversedBy="announces")
     * @JoinColumn(name="announces_type_id", referencedColumnName="id")
     */
    protected $type;

    /**
     * @ManyToOne(targetEntity="\models\forum\Topic")
     * @JoinColumn(name="forum_topic_id", referencedColumnName="id")
     */
    protected $topic;

    /** @Column(type="string") **/
    protected $town;

    /** @Column(type="string") **/
    protected $postalCode;

    /** @Column(type="string", nullable=true) **/
    protected $duration;

    /** @Column(type="date", nullable=true) **/
    protected $date;

    /** @Column(type="integer") */
    protected $idUser;

    /** @Column(type="text") **/
    protected $description;

    /**
     * Announce constructor.
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * @param mixed $town
     */
    public function setTown($town)
    {
        $this->town = $town;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    public function getUser() {
        $db = new DatabaseUser();
        return $db->getUserById($this->idUser);
    }
    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $idUser
     */
    public function setUser(User $user)
    {
        $this->idUser = $user->getId();
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }





}
