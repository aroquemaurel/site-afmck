<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/04/16
 * Time: 23:58
 */

namespace models\forum;

/**
 * @Entity @Table(name="forum_topic")
 **/
class Topic
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $title;

    /** @Column(type="string") **/
    protected $subtitle;

    /** @Column(type="boolean") */
    protected $locked = false;

    /**
     * @ManyToOne(targetEntity="Forum", inversedBy="topics")
     * @JoinColumn(name="forum_id", referencedColumnName="id")
     */
    protected $forum;

    /**
     * @OneToMany(targetEntity="Post", mappedBy="topic")
     */
    protected $posts;

}