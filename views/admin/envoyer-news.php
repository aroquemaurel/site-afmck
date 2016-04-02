<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Envoyer une newsletter</h1>
    <?php echo "La newsletter ci-dessous sera envoyée à ".count($users) ." utilisateurs.";?>
    <?php
    echo $news->getContent();
    ?>
    <div style="text-align: center">
        <a href="<?php echo Visitor::getInstance()->getRootPage()."/admin/envoyer-news.php?id=".$news->getId();?>&send=1">
            <button type="button" id="acceptBtn" class="btn btn-primary"><i class="glyphicon glyphicon-ok-sign"></i>&nbsp;Envoyer la news</button>
        </a>
    </div>

</div>