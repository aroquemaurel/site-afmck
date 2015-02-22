<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/01/15
 * Time: 18:49
 */

namespace utils;


class Utils {
    public static function getOptimalCost($timeTarget)
    {
        $cost = 9;
        do {
            $cost++;
            $start = microtime(true);
            password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
            $end = microtime(true);
        } while (($end - $start) < $timeTarget);

        return $cost;
    }

}