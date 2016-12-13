<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 13/12/16
 * Time: 23:14
 */

namespace utils;


class StringHelper
{
    public static function trunkString(string $original, int $maxSize) : string {
        if(strlen($original) > $maxSize) {
            return substr($original, 0, $maxSize-3).'...';
        }

        return $original;
    }
}