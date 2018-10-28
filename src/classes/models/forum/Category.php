<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/04/16
 * Time: 23:58
 */

namespace models\forum;

/**
 * @Entity
 * @Table(name="forum_category")
 **/
class Category
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $name;

    /**
     * @OneToMany(targetEntity="Forum", mappedBy="category")
     * @OrderBy({"position" = "ASC"})
     */
    protected $forums;

    /** @Column(type="integer") **/
    protected $position;

    public function getName() {
        return $this->name;
    }

    public function getForums() {
        return $this->forums;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    public function moveUp() {
        --$this->position;
    }

    public function moveDown() {
        ++$this->position;
    }



}
