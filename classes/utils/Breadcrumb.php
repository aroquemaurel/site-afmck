<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/11/14
 * Time: 23:05
 */
namespace utils;

class Breadcrumb {
    private $links;

    public function __construct($links) {
        $this->links = $links;
    }

    public function display() {
        echo ' <div class="container">';
        echo '<div class="col-md-8">';
		echo ' 	<ul class="breadcrumb">';
        foreach($this->links as $link) {
            echo '<li>'.($link->hasUrl() ? '<a href="'.$link->getUrl().'">' :
                    '').$link->getLink().($link->hasUrl() ? '</a>' : '').'</li>';
        }
        echo '</ul></div>';
        echo '<div class="col-md-4">';
        echo '<form method="get" action="'.\Visitor::getRootPage().'/members/recherche.php">';
        echo '<div class="input-group">';
        echo '<span class="input-group-btn">';
        echo '<button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>';
        echo '</span>';
        echo '<input type="text" name="search" class="form-control" placeholder="Rechercher...">';

        echo '</div><!-- /input-group -->';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
}