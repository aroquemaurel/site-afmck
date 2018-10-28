<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/01/17
 * Time: 23:21
 */

namespace models\articles;
use Visitor;

/**
 * @Entity
 * @Table(name="articles_keyword")
 **/
class Keyword
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $name;

    /**
     * Keyword constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    public static function getRepository()
    {
        return Visitor::getEntityManager()->getRepository('models\articles\Keyword');
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /*
     * @OneToMany(targetEntity="KeywordArticle", mappedBy="keyword")
     *
    protected $articles;*/




}