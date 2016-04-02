<?php
namespace models\forum;

/**
 * @Entity @Table(name="forum_forum")
 **/
class Forum
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $name;

    /**
     * @ManyToOne(targetEntity="Category", inversedBy="forums")
     * @JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /** @Column(type="string") **/
    protected $description;

    /**
     * @OneToMany(targetEntity="Topic", mappedBy="forum")
     */
    protected $topics;
}