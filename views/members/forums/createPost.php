<div class="forum-post">
    <?php
    echo '<div class="author">'.Visitor::getInstance()->getUser()->getFirstName().'<br/>'.Visitor::getInstance()->getUser()->getLastName().'</div>';
    ?>
    <div class="message" style="min-height: 400px;">
            <div class="form-group">
                <?php utils\Wysiwyg::display(); ?>
            </div>
            <textarea style="visibility: hidden" id="hiddeninput" name="content"><?php if(isset($news)) { echo $news->getContent(); }?></textarea>

            <button id="submit" type="submit" style="margin: auto; margin-top: -50px; width: 250px; "
                    class="btn btn-primary btn-block btn-lg">
                <i class="glyphicon glyphicon-ok-sign"></i>&nbsp;<?php echo $titleBtn;?>
            </button>

    </div>
</div>

<?php
$script = utils\Wysiwyg::getScriptSrc();
$script .= utils\Wysiwyg::getJsToolbar();
$script .= '<script type="text/javascript">
    $(function(){
        $(\'#submit\').click(function () {
            var mysave = $(\'#editor\').html();
            $(\'#hiddeninput\').val(mysave);
        });
    });
</script>';
?>