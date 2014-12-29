<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/12/14
 * Time: 12:14
 */

class Image {
    public static function miniLink($folder, $filename, $title) {
        echo '<li><a target="'.$folder.'/'.$filename.'.jpg"
                class="miniLink" name="'.$title.'"
                href="'.$folder.'/'.$filename.'.pdf">
                <i class="glyphicon glyphicon-download-alt"></i>
                '.$title.'</a></li>';
    }
}