<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 21/07/15
 * Time: 22:33
 */

namespace models;


class File {
    private $path;
    private $title;

    function __construct($title, $path)
    {
        $this->path = $path;
        $this->title = $title;
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
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }


}