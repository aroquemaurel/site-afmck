<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 29/12/14
 * Time: 12:14
 */

class Image {
    public static function miniLink($folder, $filename, $title) {
        if(!file_exists($folder.'/mini/'.$filename.'.jpg')) {
            self::createPdfMini($folder.'/'.$filename.'.pdf', $folder.'/mini/'.$filename.'.jpg');
        }
        echo '<li><a target="'.$folder.'/mini/'.$filename.'.jpg"
                class="miniLink" name="'.$title.'"
                href="'.$folder.'/'.$filename.'.pdf">
                <i class="glyphicon glyphicon-download-alt"></i>
                '.$title.'</a></li>';
    }

    public static function miniTooltipLink($folder, $filename, $title) {
        if(!file_exists($folder.'/mini/'.$filename.'.jpg')) {
            self::createPdfMini($folder.'/'.$filename.'.pdf', $folder.'/mini/'.$filename.'.jpg');
        }
        echo '<li><i class="glyphicon glyphicon-download-alt"></i>
                <a class="tooltip2"
                href="'.$folder.'/'.$filename.'.pdf">
                '.$title.'
                <span>
                <img id="mini" width="200" src="'.$folder.'/mini/'.$filename.'.jpg" style="text-align: center;margin:auto"/>
                <p id="description" style="font-size: 10pt">'.$title.'</p>
            </span>
                </a>
                </li>';

    }

    public static function createPdfMini($in, $out) {
        exec("/usr/bin/gs -o \"$out\" -sDEVICE=jpeg -r70 \"$in\"");
    }

    public static function miniLinkJs() {
        return "<script>
$('.miniLink').bind('mouseenter', function() {
        img = $(this).attr('target');
        $('#mini').attr('src', img);
        $('#description').empty();
        $('#description').append($(this).attr('name'));
});
</script>";
    }
}