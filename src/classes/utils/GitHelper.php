<?php
declare(strict_types = 1);

namespace utils;

/**
 * Class GitHelper
 */
class GitHelper {
    /**
     * Return the current Git branch. Can be a tag.
     * @Return string
     */
    public static function getCurrentBranch() : string {
        $stringfromfile = file('.git/HEAD', FILE_USE_INCLUDE_PATH);

        $firstLine = $stringfromfile[0]; //get the string from the array
        $explodedstring = explode("/", $firstLine, 3); //seperate out by the "/" in the string

        $branchName = $explodedstring[2]; //get the one that is always the branch name
        return $branchName;
    }

    /**
     * Return the current Git Tag
     * @return string
     */
    public static function getCurrentTag() : string {
        exec('git describe --tags --abbrev=0', $tag);

        if(isset($tag[0])) {
            if(substr($tag[0], 0, 1) == "V") {
                return substr($tag[0], 1, strlen($tag[0])-1);
            } else {
                return trim($tag[0]);
            }
        } else {
            return "";
        }
    }

    /**
     * return the current Git commit
     * @return string
     */
    public static function getCurrentRevision() : string {
        exec('git show --oneline -s', $commit);
        return explode(' ', $commit[0])[0];
    }

}