<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/01/17
 * Time: 23:21
 */

namespace models\articles;

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
     * @OneToMany(targetEntity="KeywordArticle", mappedBy="keyword")
     */
    protected $articles;

}