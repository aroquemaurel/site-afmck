<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 21/07/15
 * Time: 22:33
 */

namespace models;


class Tag {
    private $tag;

    function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }


}