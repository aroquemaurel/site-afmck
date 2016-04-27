<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 26/04/16
 * Time: 23:19
 */

namespace models\forum;
use database\DatabaseUser;

/**
 * @Entity
 * @Table(name="forum_rights")
 **/
class RightForum
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @ManyToOne(targetEntity="Forum", inversedBy="rights")
     * @JoinColumn(name="forum_id", referencedColumnName="id")
     */
    protected $forum;

    /** @Column(type="integer") **/
    protected $right;

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        $db = new DatabaseUser();

        return $db->getGroupById($this->right)->getName();
    }


}