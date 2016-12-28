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
        if(!file_exists(Visitor::getRootPath().'/'.$folder.'/mini/'.$filename.'.jpg')) {
            self::createPdfMini(Visitor::getRootPath().'/'.$folder.'/'.$filename.'.pdf', $folder.'/mini/'.$filename.'.jpg');
        }
        echo '<div class="tooltip2">';
        if($li) {
            echo '<li>';
        }
        echo '<i class="glyphicon glyphicon-download-alt"></i>
                <a
                href="'.Visitor::getRootPage().'/'.$folder.'/'.$filename.'.pdf">
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
        if(!file_exists(Visitor::getRootPath()."/".$folder.'/mini/'.$filename.'.jpg')) {
            self::createPdfMini(Visitor::getRootPath()."/".$folder.'/'.$filename.'.pdf', Visitor::getRootPath()."/".$folder.'/mini/'.$filename.'.jpg');
        }
        echo '<div class="thumbnail with-caption" style="width: 300px;text-align: center">
                    <a href="'.Visitor::getRootPage().'/'.$folder.'/'.$filename.'.pdf">
                        <img src="'.Visitor::getRootPage().'/'.$folder.'/mini/'.$filename.'.jpg"  alt="'.$description.'"/>
                    </a>
                    <p style="font-size: 10pt"><a href="'.Visitor::getRootPage().'/'.$folder.'/'.$filename.'.pdf"><i class="glyphicon glyphicon-download-alt"></i>&nbsp'.$description.
                    '</a><small>'.$frs.'</small></p>
                </div>';
    }
    public static function thumbnails($filename, $link, $width="200px", $height="120px") {
        echo '<div class="thumbnail with-caption" style="width: '.$width.';height:'.$height.';margin: 5px;padding:auto;text-align: center">
                    <a href="'.$link.'">
                        <img src="'.Visitor::getRootPage().'/'.$filename.'"  alt="'.$filename.'"/>
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

    public static function modalIframe($iframeLink, $modalTitle) {
        $time = uniqid(sha1(time()));
        echo '<a href="#"
   data-toggle="modal"
   data-target="#basicModal-'.$time.'"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;'.$modalTitle.'</a>';
        echo '<div class="modal fade" id="basicModal-'.$time.'" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog" style="margin:auto;width: 95%; height: 95%; ">
        <div class="modal-content" style="margin:auto;height:100%">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">'.$modalTitle.'</h4>
            </div>
            <div class="modal-body" style="text-align: center;">
                <iframe style="text-align: center;" onload="this.width=screen.width*0.75;this.height=screen.height*0.75;"
                 src="'.$iframeLink.'" id="myFrame"></iframe>';
            echo '</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>';

    }
}
