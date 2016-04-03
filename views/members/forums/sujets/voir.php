<?php
$breadcrumb->display()?>
    <div class="container" style="">
        <?php
        echo '<h1>'.$topic->getTitle().' <small>'.$topic->getSubtitle().' </small></h1>';


        foreach($topic->getPosts() as $post) {
            echo '<div class="forum-post">'.
                '<div class="author">'.$post->getUser()->getFirstName().'<br/>'.$post->getUser()->getLastName().'</div>'.
                '<div class="message">'.
                ($topic->getCreator()->getId() == $post->getUser()->getId() ? "<span class='creator'>Auteur du sujet</span>" : "").
                '<span class="date">'.utils\Utils::getPlainDate($post->getDate()).'</span><div class="post">'.$post->getContent().'</div></div>'.
                '</div>';
        }
        ?>
        <hr/>
        <h2>Répondre au sujet « <?Php echo $topic->getTitle();?> »</h2>
        <div class="forum-post">
            <?php
            echo '<div class="author">'.Visitor::getInstance()->getUser()->getFirstName().'<br/>'.Visitor::getInstance()->getUser()->getLastName().'</div>';
            ?>
            <div class="message" style="min-height: 400px;">
                <form enctype="multipart/form-data"  role="form" method="post" action="<?php echo Visitor::getRootPage().'/members/forums/sujets/repondre.php';?>">
                    <div class="form-group">
                        <?php utils\Wysiwyg::display(); ?>
                    </div>
                    <textarea style="visibility: hidden" id="hiddeninput" name="content"><?php if(isset($news)) { echo $news->getContent(); }?></textarea>

                    <input type="hidden" name="idTopic" value="<?php echo $topic->getId();?>"/>
                    <button id="submit" type="submit" style="margin: auto; margin-top: -50px; width: 250px; "
                            class="btn btn-primary btn-block btn-lg">
                        <i class="glyphicon glyphicon-ok-sign"></i>&nbsp;Répondre à ce sujet
                    </button>
                </form>

            </div>
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