<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/11/14
 * Time: 23:05
 */

class Breadcrumb {
    private $links;

    public function __construct($links) {
        $this->links = $links;
    }

    public function display() {
        echo ' <div class="container">';

		echo ' 	<ul class="breadcrumb">';

        foreach($this->links as $link) {
            echo '<li><a href="#">'.($link != 'home' ? $link : '<i class="glyphicon glyphicon-home"></i>').'</a></li>';
        }
        echo '</ul></div>';
    }
}