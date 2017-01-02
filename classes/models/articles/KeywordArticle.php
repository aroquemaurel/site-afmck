<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/01/17
 * Time: 23:22
 */

namespace models\articles;

/**
 * @Entity
 * @Table(name="articles_keywordarticle")
 **/
class KeywordArticle
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @ManyToOne(targetEntity="Article", inversedBy="articles")
     * @JoinColumn(name="article_id", referencedColumnName="id")
     * */
    protected $article;

    /**
     * @ManyToOne(targetEntity="Keyword", inversedBy="keywords")
     * @JoinColumn(name="keyword_id", referencedColumnName="id")
     * */
    protected $keyword;

}