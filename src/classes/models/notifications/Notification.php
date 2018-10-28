<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/04/16
 * Time: 23:58
 */

namespace models\notifications;
use DateTime;
use models\User;
use Visitor;

/**
 * @Entity
 * @Table(name="notification_notification", indexes={@Index(columns={"idUser"})})
 **/
class Notification
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $title;

    /** @Column(type="string") **/
    protected $description;

    /** @Column(type="datetime") **/
    protected $date;

    /**
     * @ManyToOne(targetEntity="NotificationType")
     * @JoinColumn(name="notificationtype_id", referencedColumnName="id")
     */
    protected $type;

    /** @Column(type="integer") **/
    protected $idUser;

    /** @Column(type="boolean") **/
    protected $hasRead;

    /** @Column(type="string") **/
    protected $link;

    /**
     * Notification constructor.
     * @param $title
     * @param $description
     * @param $type
     */
    public function __construct(string $title, string $description, $type, User $u, string $link)
    {
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->hasRead = false;
        $this->idUser = $u->getId();
        $this->date = new DateTime();
        $this->link = $link;
    }

    public static function getRepo() {
        return Visitor::getEntityManager()->getRepository('models\notifications\Notification');
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @return mixed
     */
    public function getHasRead()
    {
        return $this->hasRead;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @param mixed $hasRead
     */
    public function setHasRead($hasRead)
    {
        $this->hasRead = $hasRead;
    }





}