<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/04/16
 * Time: 23:58
 */

namespace models\forum;
use database\DatabaseUser;
use models\User;
use utils\StringHelper;

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
     * @OneToMany(targetEntity="PostApprovedUser", mappedBy="post")
     * @OrderBy({"idUser" = "ASC"})
     */
    protected $usersApproved;

    public function userAproved() {

    }

    public function doesUserAgree(User $user)  : bool {
        foreach($this->usersApproved as $userapproved) {
            if($userapproved->isAprovement() &&
                $userapproved->getIdUser() == $user->getId()) {
                return true;
            }
        }

        return false;
    }

    public function doesUserDisagree(User $user) : bool {
        foreach($this->usersApproved as $userapproved) {
            if(!$userapproved->isAprovement() &&
                $userapproved->getIdUser() == $user->getId()) {
                return true;
            }
        }

        return false;
    }


    /**
     * @return int
     */
    public function getNbApprovement() : int {
        $ret = 0;
        foreach($this->usersApproved as $userapproved) {
            if($userapproved->isAprovement()) {
                ++$ret;
            }
        }

        return $ret;
    }

    /**
     * @return int
     */
    public function getNbDisaprovement() : int {
        $ret = 0;
        foreach($this->usersApproved as $userapproved) {
            if(!$userapproved->isAprovement()) {
                ++$ret;
            }
        }

        return $ret;
    }

    /**
     * @param $user
     */
    public function aproved($user) {
        $aprov = new PostApprovedUser($user, $this, true);
        \Visitor::getEntityManager()->persist($aprov);
        \Visitor::getEntityManager()->flush();
    }

    public function removeAgreed($user) {
        $repo = \Visitor::getEntityManager()->getRepository('models\forum\PostApprovedUser');
        $app = $repo->findOneBy(["idUser" => $user->getId(), "post"=>$this]);
        \Visitor::getEntityManager()->remove($app);
        \Visitor::getEntityManager()->flush();
    }

    /**
     * @param $user
     */
    public function disaproved($user) {
        $aprov = new PostApprovedUser($user, $this, false);
        \Visitor::getEntityManager()->persist($aprov);
        \Visitor::getEntityManager()->flush();
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
        return StringHelper::addHref($this->content);
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