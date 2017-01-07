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

}