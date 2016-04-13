<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 04/04/16
 * Time: 20:52
 */

namespace models\forum;
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

    /**
     * @ManyToOne(targetEntity="Topic", inversedBy="usersRead")
     * @JoinColumn(name="topic_id", referencedColumnName="id")
     * */
    protected $topic;



    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

    public function setUser(User $user)
    {
        $this->idUser = $user->getId();
    }

    public function getIdUser() {
        return $this->idUser;
    }
}