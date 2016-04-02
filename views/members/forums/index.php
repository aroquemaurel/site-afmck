<?php $breadcrumb->display()?>
<div class="container" style="">
    <h1>Liste des forums</h1>
    <table class="table table-striped table-hover" style="width: 99%;">
    <?php
    foreach($categories as $category) {
        echo '<tr style="background-color: #96A5C0">';
            echo '<th colspan="3">'.$category->getName().'</th>';
        echo '</tr>';
        foreach($category->getForums() as $forum) {
            echo '<tr>';
            echo '<td style=""><a href="'.Visitor::getRootPage().'/members/forums/voir-forum.php?id='.$forum->getId().'">'.$forum->getName().
                    '</a><p style="font-size: 9pt"><em>'.$forum->getDescription().'</em>'.
                '</p></td>';
            echo '<td style="width: 50px">TODO 1</td>';
            echo '<td style="width: 50px">TODO 2</td>';
            echo '</tr>';
        }
        echo '</tr>';
    }
    ?>
    </table>
</div>