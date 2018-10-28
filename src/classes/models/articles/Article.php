<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/01/17
 * Time: 23:20
 */

namespace models\articles;
use Visitor;

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

    /** @Column(type="boolean") */
    protected $notIndexed = false;
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

    public static function getRepository() {
        return Visitor::getEntityManager()->getRepository('models\articles\Article');
    }

    public function getStringkeywords() : string {
        $str = '';
        foreach($this->keywords as $keyword) {
            $str .= $keyword->getKeyword()->getName();
            $str .= ', ';
        }

        return rtrim($str, ', ');
    }


    public function addKeyword(Keyword $keyword) {
        $ak = new KeywordArticle();
        $ak->setArticle($this);
        $ak->setKeyword($keyword);
        Visitor::getEntityManager()->persist($ak);
        Visitor::getEntityManager()->flush();
    }

    public function removeKeywords() {
        foreach($this->getKeywords() as $keyword) {
            Visitor::getEntityManager()->remove($keyword);
        }
    }
}