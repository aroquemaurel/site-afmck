<?php $breadcrumb->display()?>
<div class="container" style="">
    <h1>Voir le forum « <?php echo $forum->getName();?> »</h1>

    <a href="<?php echo Visitor::getRootPage().'/members/forums/sujets/nouveau.php?forum='.$forum->getId();?>">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Créer un nouveau sujet</button>
    </a>

    <table class="table table-striped table-hover" style="width: 99%; margin-top: 15px;">
    <?php
    foreach($forum->getTopics() as $topic) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="'.Visitor::getRootPage().'/members/forums/sujets/voir.php?id='.$topic->getId().'"><b>'.$topic->getTitle().'</b></a><br>';
        if($topic->getSubtitle() != null && $topic->getSubtitle() != "") {
            echo '<p><em style="font-size: 9pt">' . $topic->getSubtitle() . '</em></p>';
        }
        echo '</td>';
        echo '<td style="width: 100px">TODO 1</td>';
        echo '<td style="width: 100px">TODO 2</td>';
        echo '</tr>';
    }
    ?>
    </table>
</div>