<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 21/07/15
 * Time: 22:33
 */

namespace models;


use DateTime;

class Document {
    private $tags;
    private $files;
    private $title;
    private $description;
    private $date;
    private $user;
    private $id;
    private $category;

    public function __construct() {
        $this->tags = array();
        $this->files = array();
    }
    public function hydrat($data) {
        $this->title = $data->title;
        $this->description = $data->description;
        $this->date = new DateTime($data->date);
        $this->user = new User();
        $this->user->hydrat($data);
        $this->id = $data->idDocument;
		$this->category = new Category($data->category, $data->name);

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
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param mixed $file
     */
    public function setFiles($file)
    {
        $this->files = $file;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    public function addTag($tag) {
        foreach($this->tags as $t) {
            if($t == $tag) {
                return;
            }
        }

        $this->tags[] = $tag;
    }

    public function addFile($titleFile, $pathFile) {
        foreach($this->files as $file) {
            if($file->getTitle() == $titleFile && $file->getPath() == $pathFile) {
                return;
            }
        }
        $this->files[] = new File($titleFile, $pathFile);
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }


}
