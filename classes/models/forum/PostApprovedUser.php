<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 24/12/16
 * Time: 13:40
 */

namespace models\forum;
use models\User;


/**
 * @Entity @Table(name="forum_post_approved_user")
 **/

class PostApprovedUser
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="integer") */
    protected $idUser;

    /**
     * @ManyToOne(targetEntity="Post", inversedBy="usersApproved")
     * @JoinColumn(name="post_id", referencedColumnName="id")
     **/
    protected $post;

    /** @Column(type="boolean") */
    protected $isAprovement;

    /**
     * PostApprovedUser constructor.
     * @param User $user
     * @param Post $post
     * @param $isAprovement
     * @internal param $idUser
     */
    public function __construct(User $user, Post $post, $isAprovement)
    {
        $this->idUser = $user->getId();
        $this->post = $post;
        $this->isAprovement = $isAprovement;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return mixed
     */
    public function isAprovement()
    {
        return $this->isAprovement;
    }

    /**
     * @param mixed $isAprovement
     */
    public function setIsAprovement($isAprovement)
    {
        $this->isAprovement = $isAprovement;
    }




}