<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/04/16
 * Time: 23:58
 */

namespace models\forum;

/**
 * @Entity @Table(name="forum_post")
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


    /** @Column(type="string") **/
    protected $content;

    /** @Column(type="datetime") **/
    protected $date;

    /** @Column(type="integer") */
    protected $idUser;
}