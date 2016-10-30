<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 27/02/16
 * Time: 18:11
 */

namespace models;

class NewsToSend {
    private $user;
    private $news;

    public function __construct(User $user, News $news) {
        $this->user = $user;
        $this->news = $news;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return News
     */
    public function getNews()
    {
        return $this->news;
    }


}