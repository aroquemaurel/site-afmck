<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/01/17
 * Time: 23:20
 */

namespace models\articles;

/**
 * @Entity
 * @Table(name="articles_article")
 **/
class Article
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $title;

    /** @Column(type="string") **/
    protected $path;

    /**
     * @OneToMany(targetEntity="KeywordArticle", mappedBy="article")
     */
    protected $keywords;

    /**
     * Article constructor.
     * @param $title
     * @param $path
     */
    public function __construct($title, $path)
    {
        $this->title = $title;
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }





}