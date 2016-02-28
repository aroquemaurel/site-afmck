<?php
namespace utils;
class Wysiwyg {

    public static function display($content="") {
        self::displayEditor($content);
    }

    private static function displayEditor($content="") {
        echo'<textarea name="content">'.$content.'</textarea>';
    }

    public static function getScriptSrc() {
        $script = '<script src="' . \Visitor::getInstance()->getRootPage() . '/style/js/tinymce/tinymce.min.js"></script>';
        $script .= '<script src="' . \Visitor::getInstance()->getRootPage() . '/style/js/tinymce/plugins/paste/plugin.min.js"></script>';

        return $script;
    }

    public static function getJsToolbar() {
        $script = "  <script>$(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');";
        $script .= "$.each(fonts, function (idx, fontName) {".
            "fontTarget.append($('<li><a data-edit=\"fontName ' + fontName +'\" style=\"font-family:\\''+ fontName +'\\'\">'+fontName + '</a></li>'));".
            "});";
        $script .= "$('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})";
        $script .= '.change(function () {$(this).parent(\'.dropdown-menu\').siblings(\'.dropdown-toggle\').dropdown(\'toggle\');})
        .keydown(\'esc\', function () {this.value=\'\';$(this).change();});';

        $script .= "$('[data-role=magic-overlay]').each(function () {
        var overlay = $(this), target = $(overlay.data('target'));
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if (\"onwebkitspeechchange\"  in document.createElement(\"input\")) {
        var editorOffset = $('#editor').offset();
        //$('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
    $('#voiceBtn').hide();
}
	};
	function showErrorAlert (reason, detail) {
        var msg='';
        if (reason==='unsupported-file-type') { msg = \"Unsupported format \" +detail; }
        else {
            console.log(\"error uploading file\", reason, detail);
        }
        $('<div class=\"alert\"> <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>'+
            '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
    };
    initToolbarBootstrapBindings();
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
         $('#editor').css('font-size', '12pt');
  });</script>";
        return $script;
    }
}
