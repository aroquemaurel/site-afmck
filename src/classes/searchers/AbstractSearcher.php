<?php
declare(strict_types = 1);

namespace searchers;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 24/12/16
 * Time: 11:09
 */
abstract class AbstractSearcher
{
    public abstract function search(string $search);
}