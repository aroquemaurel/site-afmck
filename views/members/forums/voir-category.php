<?php
use utils\Utils;
use viewers\Pagination;
use viewers\TopicForumViewer;

$breadcrumb->display()?>
<div class="container" style="">
    <h1>Voir la catégorie « <?= $category->getName();?> »</h1>

    <?php
    if(count($forums) != 0) {
        // TODO echo TopicForumViewer::getTopicsTable($topics);
        \viewers\forums\ForumViewer::getTableForumsOfCategory($category, false, 0);
        ?>

        <?php
    } else {
        echo "<p style=\"margin-top: 20px;\"><em>Aucun forum n'est présent dans cette catégorie.</em></p>";
    }
    ?>
</div>
