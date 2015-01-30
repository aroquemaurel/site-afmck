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
        echo '<li><a  target="'.$folder.'/mini/'.$filename.'.jpg"
                class="miniLink" name="'.$title.'"
                href="'.$folder.'/'.$filename.'.pdf">
                <i class="glyphicon glyphicon-download-alt"></i>
                '.$title.'</a></li>';
    }

    public static function miniTooltipLink($folder, $filename, $title, $li=true) {
        if(!file_exists($folder.'/mini/'.$filename.'.jpg')) {
            self::createPdfMini($folder.'/'.$filename.'.pdf', $folder.'/mini/'.$filename.'.jpg');
        }
        echo '<div class="tooltip2">';
        if($li) {
            echo '<li>';
        }
        echo '<i class="glyphicon glyphicon-download-alt"></i>
                <a
                href="'.$folder.'/'.$filename.'.pdf">
                '.$title;
                /*<span>
                <img id="mini" width="200" src="'.$folder.'/mini/'.$filename.'.jpg" style="text-align: center;margin:auto"/>
                <p id="description" style="font-size: 10pt">'.$title.'</p>
            </span>*/
        echo '
                </a>';
        if($li) {
            echo '</li>';
        }
        echo '</div>';
    }

    public static function createPdfMini($in, $out) {
        exec("/usr/bin/gs -o \"$out\" -sDEVICE=jpeg -r70 \"$in\"");
    }

    public static function thumbnailsWithCaption($folder, $filename, $description, $frs='') {
        echo '<div class="thumbnail with-caption" style="width: 300px;text-align: center">
                    <a href="'.$folder.'/'.$filename.'.pdf">
                        <img src="'.$folder.'/'.$filename.'.jpg"  alt="'.$description.'"/>
                    </a>
                    <p style="font-size: 10pt"><i class="glyphicon glyphicon-download-alt"></i>&nbsp<a>'.$description.
                    '</a><small>'.$frs.'</small></p>
                </div>';
    }
    public static function thumbnails($filename, $link, $width="200px", $height="120px") {
        echo '<div class="thumbnail with-caption" style="width: '.$width.';height:'.$height.';margin: 5px;padding:auto;text-align: center">
                    <a href="'.$link.'">
                        <img src="'.$filename.'"  alt="'.$filename.'"/>
                    </a>
                </div>';
    }
    public static function thumbnailsPdf($folder, $filename, $width="120px") {
        if(!file_exists($folder.'/mini/'.$filename.'.jpg')) {
            self::createPdfMini($folder.'/'.$filename.'.pdf', $folder.'/mini/'.$filename.'.jpg');
        }

        echo '<div class="thumbnail with-caption" style="width: '.$width.';margin: 5px;padding:auto;text-align: center">
                    <a href="'.$folder.'/'.$filename.'.pdf">
                        <img src="'.$folder.'/mini/'.$filename.'.jpg"  alt="'.$filename.'"/>
                    </a>
                </div>';
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