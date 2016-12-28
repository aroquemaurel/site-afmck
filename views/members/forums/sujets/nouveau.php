<?php
$breadcrumb->display()?>
<div class="container" style="">
    <h1><?= $title;?></h1>
    <?php
    $titleBtn = "Créer le sujet";
    ?>
    <form enctype="multipart/form-data"  role="form" method="post"
          action="<?= Visitor::getRootPage().'/members/forums/sujets/nouveau.php?forum='.$forum->getId();?>">
        <div class="row" style="width: 80%; margin: auto;">
            <div class="form-group">
                <input required="required" type="text" name="title" id="title"
                       class="form-control input-lg" placeholder="Titre" tabindex="3"
                       value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                >
            </div>
        </div>
        <div class="row" style="width: 80%; margin: auto;margin-bottom: 20px;>
            <div class="form-group">
                <input type="text" name="subtitle" id="subtitle"
                       class="form-control input-lg" placeholder="Sous-Titre (Facultatif)" tabindex="3"
                       value="<?php if(isset($news)) { echo $news->getSubtitle(); }?>"
                >
            </div>
        </div>

        <?php
    include(Visitor::getRootPath().'/views/members/forums/createPost.php');
    ?>
    </form>
</div>