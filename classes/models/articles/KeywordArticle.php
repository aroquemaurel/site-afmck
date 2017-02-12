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
     * @ManyToOne(targetEntity="Article")
     * @JoinColumn(name="article_id", referencedColumnName="id")
     * */
    protected $article;

    /**
     * @ManyToOne(targetEntity="Keyword")
     * @JoinColumn(name="keyword_id", referencedColumnName="id")
     * */
    protected $keyword;

    /**
     * @return mixed
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @return mixed
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @param mixed $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

    /**
     * @param mixed $keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
    }



}