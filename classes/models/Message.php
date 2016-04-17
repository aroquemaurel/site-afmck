<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 17/04/16
 * Time: 11:53
 */

namespace models\forum;
use database\DatabaseUser;

/**
 * @Entity @Table(name="message")
 **/

class Message
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $message;

    /** @Column(type="integer") **/
    protected $idUser;

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getUser() {
        $db = new DatabaseUser();
        return $db->getUserById($this->idUser);
    }


}