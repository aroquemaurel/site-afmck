<?php
$breadcrumb->display();
?>
<div class="container" style="">
    <h1><?= $title;?></h1>
    <?php
    $titleBtn = "Modifier un message";
    ?>
    <form enctype="multipart/form-data"  role="form" method="post"
          action="<?= Visitor::getRootPage().'/members/forums/messages/modifier.php?id='.$post->getId();?>">
        <?php
        if($post->getTopic()->getCreator()->getId() == Visitor::getInstance()->getUser()->getId()) {
            if (isset($announce)) {
                echo \viewers\AnnounceViewer::getCreateAnnouncementForm($announce);
            } else {
                    echo '
            <div class="row" style="width: 80%; margin: auto;">
                <div class="form-group">
                    <input required="required" type="text" name="title" id="title"
                           class="form-control input-lg" placeholder="Titre" tabindex="3"
                           value="' . (isset($post) && $post->getTopic() != null ? $post->getTopic()->getTitle() : '') . '"
                    >
                </div>
            </div>
            <div class="row" style="width: 80%; margin: auto;margin-bottom: 20px;">
                <div class="form-group">
            <input type="text" name="subtitle" id="subtitle"
                   class="form-control input-lg" placeholder="Sous-Titre (Facultatif)" tabindex="3"
                   value="' . (isset($post) ? $post->getTopic()->getSubtitle() : '') . '"

            </div>';
                }
            }
        ?>
</div>

<?php
include(Visitor::getRootPath().'/views/members/forums/createPost.php');
?>
</form>
</div>