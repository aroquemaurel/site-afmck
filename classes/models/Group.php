<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 22/12/14
 * Time: 12:39
 */
namespace models;

class Group {
    private $id;
    private $name;

    private $autorhizedPages;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getAutorhizedPages()
    {
        return $this->autorhizedPages;
    }

    /**
     * @param mixed $autorhizedPages
     */
    public function setAutorhizedPages($autorhizedPages)
    {
        $this->autorhizedPages = $autorhizedPages;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function hydrat() {

    }

} 