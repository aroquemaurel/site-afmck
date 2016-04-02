<?php $breadcrumb->display()?>
<div class="container" style="">
    <h1>Voir le forum « <?php echo $forum->getName();?> »</h1>

    <table class="table table-striped table-hover" style="width: 99%;">
    <?php
    foreach($forum->getTopics() as $topic) {
        echo '<tr>';
        echo '<td>';
        echo '<a href="'.Visitor::getRootPage().'/members/forums/voir-sujet.php?id='.$topic->getId().'"><b>'.$topic->getTitle().'</b></a><br>';
        if($topic->getSubtitle() != null && $topic->getSubtitle() != "") {
            echo '<p><em>' . $topic->getSubtitle() . '</em></p>';
        }
        echo '</td>';
        echo '<td style="width: 100px">TODO 1</td>';
        echo '<td style="width: 100px">TODO 2</td>';
        echo '</tr>';
    }
    ?>
    </table>
</div>