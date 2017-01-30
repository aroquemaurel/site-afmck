<div class="forum-post">
    <?php
    $user = $post != null ? $post->getUser() : Visitor::getInstance()->getUser();
    echo '<div class="author">
<div class="thumbnail" style="width: 110px; margin: auto;text-align: center">
                <img width="100px" src="'.$user->getAvatar().'"/></div>
                <p id="description" style="font-size: 10pt">'.
        $user->getFirstName().'<br/>'.$user->getLastName().
        '</p></div>';
    ?>
    <div class="message" style="min-height: 400px;">
            <div class="form-group">
                <?php utils\Wysiwyg::display(isset($post)?$post->getContent() : ''); ?>
            </div>
            <textarea style="visibility: hidden" id="hiddeninput" name="content"><?php if(isset($post)) { echo $post->getContent(); }?></textarea>

            <button id="submit" type="submit" style="margin: auto; margin-top: -50px; width: 250px; "
                    class="btn btn-primary btn-block btn-lg">
                <i class="glyphicon glyphicon-ok-sign"></i>&nbsp;<?= $titleBtn;?>
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