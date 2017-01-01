<?php use utils\Pagination;
use utils\Utils;
use viewers\TopicForumViewer;

$breadcrumb->display()?>
<div class="container" style="">
    <h1>Voir le forum « <?= $forum->getName();?> »</h1>

    <a href="<?= Visitor::getRootPage().'/members/forums/sujets/nouveau.php?forum='.$forum->getId();?>">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Créer un nouveau sujet</button>
    </a>

    <?php
    $p = new Pagination($currentPage,
        \utils\Pagination::getNbPages($topics->count(), FORUM_NB_TOPIC_FORUM),
        Visitor::getRootPage().'/members/forums/voir-forum.php?id='.$forum->getId());


    if(count($topics) != 0) {
    echo $p->toString();

    echo TopicForumViewer::getTopicsTable($topics);

    ?>

    <?php
    echo $p->toString();

    } else {
        echo "<p style=\"margin-top: 20px;\"><em>Aucun sujet n'a été créé pour le moment.</em></p>";
    }
    ?>
</div>
