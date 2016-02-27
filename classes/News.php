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
    private $subtitle;
    private $content;
    private $author;
    private $date;

    public function __construct() {
        $this->date = new DateTime();
        $this->id = 0;
    }
    public function hydrat($data) {
        $this->id = $data->id;
        $this->title = utf8_encode($data->title);
        $this->content = utf8_encode($data->content);
        $this->author = (new DatabaseUser())->getUserById($data->author);
        $this->date = new DateTime($data->date);
        $this->subtitle = utf8_encode($data->subtitle);
    }

    public function commit() {
        $db = new DatabaseNews();
        if($this->id == 0) {
            $db->addNew($this);
        } else {
            $db->updateNew($this);
        }
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

    public function isSend() {
        return (new DatabaseNews())->newsIsSend($this->id);
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

    /**
     * @return mixed
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param mixed $subtitle
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }



}