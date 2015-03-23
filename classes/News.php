<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 23/03/15
 * Time: 22:34
 */

class News {
    private $id;
    private $title;
    private $content;
    private $author;
    private $date;

    public function hydrat($data) {
        $this->id = $data->id;
        $this->title = utf8_encode($data->title);
        $this->content = utf8_encode($data->content);
        $this->author = (new DatabaseUser())->getUserById($data->author);
        $this->date = new DateTime($data->date);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getContent()
    {
        return nl2br($this->content);
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}