<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 08/01/17
 * Time: 11:49
 */

namespace utils;


use Visitor;

class UrlHelper
{
    public static function getCurrentPath() {
        $split = explode(Visitor::getRootPage(), $_SERVER['REQUEST_URI']);

        return $split[1];
    }
}