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

    /** @Column(type="integer") **/
    protected $order;
    /**
     * @OneToMany(targetEntity="Topic", mappedBy="forum")
     * @OrderBy({"date" = "DESC"})
     */
    protected $topics;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTopics() {
        return $this->topics;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }


}