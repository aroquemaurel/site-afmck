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

    public static function addHref(string $original) : string {
        if(strpos($original, "href")) {
            return $original;
        }

        $url = '@(http)?(s)?(://)?(([a-zA-Z])([-\w]+\.)+([^\s\.]+[^\s]*)+[^,.\s])@';
        return preg_replace($url, '<a href="http$2://$4" target="_blank" title="$0">$0</a>', $original);
    }
}