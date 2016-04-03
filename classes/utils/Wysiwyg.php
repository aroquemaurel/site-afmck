<?php
namespace utils;
class Wysiwyg {
    private static function displayToolbar() {
        echo '<div class="btn-toolbar" data-role="editor-toolbar"
                         data-target="#editor">
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                               title="Font"><i class="icon-font"></i><b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                               title="Font Size"><i class="glyphicon glyphicon-header"></i>&nbsp;<b
                                    class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a data-edit="formatBlock h2"><font size="6">Titre 1</font></a></li>
                                <li><a data-edit="formatBlock h3"><font size="5">Titre 2</font></a></li>
                                <li><a data-edit="formatBlock h4"><font size="4">Titre 3</font></a></li>
                                <li><a data-edit="formatBlock p">Paragraphe</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="bold"
                               title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i>
                            </a> <a class="btn btn-default" data-edit="italic"
                                    title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i>
                            </a> <a class="btn btn-default" data-edit="strikethrough"
                                    title="Strikethrough"><i class="icon-strikethrough"></i>
                            </a> <a class="btn btn-default" data-edit="underline"
                                    title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="insertunorderedlist"
                               title="Bullet list"><i class="icon-list-ul"></i>
                            </a> <a class="btn btn-default" data-edit="insertorderedlist"
                                    title="Number list"><i class="icon-list-ol"></i>
                            </a> <a class="btn btn-default" data-edit="outdent"
                                    title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i>
                            </a> <a class="btn btn-default" data-edit="indent" title="Indent (Tab)"><i
                                    class="icon-indent-right"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="justifyleft"
                               title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i>
                            </a> <a class="btn btn-default" data-edit="justifycenter"
                                    title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i>
                            </a> <a class="btn btn-default" data-edit="justifyright"
                                    title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i>
                            </a> <a class="btn btn-default" data-edit="justifyfull"
                                    title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                               title="Hyperlink"><i class="icon-link"></i>
                            </a>
                            <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text"
                                       data-edit="createLink" />
                                <button class="btn" type="button">Add</button>
                            </div>
                        </div>

                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="unlink"
                               title="Remove Hyperlink"><i class="icon-cut"></i>
                            </a> <a class="btn btn-default"
                                    title="Insert picture (or just drag & drop)" id="pictureBtn">
                                <i class="icon-picture"></i> <input type="file"
                                                                    data-role="magic-overlay" data-target="#pictureBtn"
                                                                    data-edit="insertImage" /> </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default" data-edit="undo"
                               title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i>
                            </a> <a class="btn btn-default" data-edit="redo"
                                    title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i>
                            </a>
                        </div>
                        <input class="pull-right" type="text" data-edit="inserttext"
                               id="voiceBtn" x-webkit-speech="" />
                    </div>';
    }
    public static function display($content="") {
        echo  '<div id="alerts"></div>';
        self::displayToolbar();
        self::displayEditor($content);
    }

    private static function displayEditor($content="") {
        echo '<div id="editor" class="lead" placeholder="'.($content != "" ? str_replace('"', "'", $content) : "").'">'.$content.'</div>';
    }

    public static function getScriptSrc() {
        $script = '<script src="' . \Visitor::getInstance()->getRootPage() . '/style/wysiwyg/external/google-code-prettify/prettify.js"></script>';
        $script .= '<script src="' . \Visitor::getInstance()->getRootPage() . '/style/wysiwyg/external/jquery.hotkeys.js"></script>';
        $script .= '<script src="' . \Visitor::getInstance()->getRootPage() . '/style/wysiwyg/src/bootstrap-wysiwyg.js"></script>';

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
