<?php

namespace utils;

use Visitor;

class Link {
    private $link;
    private $url;


    public function __construct($link, $url) {
        $this->link = $link;
        $this->url = $url;
    }

    public function hasUrl() {
        return $this->url != '#' && $this->url != null;
    }
    /**
     * @return mixed
     */
    public function getLink()
    {
        return ($this->link != 'home' ? $this->link : '<i class="glyphicon glyphicon-home"></i>');
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->link != 'home' ? $this->url : Visitor::getRootPage().'/';
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

}
?>
