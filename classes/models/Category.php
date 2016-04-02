<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/08/15
 * Time: 20:08
 */

namespace models;


use database\DatabaseDocuments;

class Category {
    private $id;
    private $name;

    function __construct($id, $name='')
    {
        $this->id = $id;
        if($name=='') {
            $db = new DatabaseDocuments();
            $this->name = $db->getCategoryName($id);
        } else {
            $this->name = $name;
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


}