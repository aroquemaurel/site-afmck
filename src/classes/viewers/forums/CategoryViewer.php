<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 07/01/17
 * Time: 12:34
 */

namespace viewers\forums;


class CategoryViewer
{
    public static function getLiCategoryList($categories) : string {
        $ret = '';
        foreach($categories as $cat) {
            $ret .= '<li><a href="'.\Visitor::getRootPage().'/members/forums/voir-categorie.php?id='.$cat->getId().'">'.$cat->getName().'</a>';
        }
        return $ret;
    }


}