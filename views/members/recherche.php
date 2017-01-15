<?php

use viewers\forums\TopicForumViewer;

$breadcrumb->display()?>
<div class="container-fluid">
    <h1>Recherche « <?= $search ?> »</h1>
    <!-- Dans&nbsp;&nbsp;
    <form method="get" action="?" style="display: inline">
        <select class="selectpicker form-control input-mini" name="levelFormation" style="display: inline;width:20%">
            <option value="1">Tout le site</option>
            <option value="2">Les articles du site</option>
            <option value="3">Le forum</option>
        </select>
    </form>
    -->
    <h2>Les articles du site</h2>
    <?php
        if(count($result['article']) == 0) {
            echo 'Aucun article correspondant à votre recherche n\'a été trouvé.';
        } else {
            echo '<table class="table table-hover forum-list" style="margin-top: 15px;">';

            $articles = array();
            foreach($result['article'] as $articleKeyword) {
                $article = $articleKeyword->getArticle();
                if (!in_array($article->getId(), $articles)) {
                    echo '<tr>';
                    echo '<td><a href="' . Visitor::getRootPage() . $article->getPath() . '">' . $article->getTitle() . '</a></td>';
                    echo '<td><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;&nbsp;';
                    foreach ($article->getKeywords() as $articleKeyword) {
                        $keyword = $articleKeyword->getKeyword()->getName();
                        echo '<i class="label label-info keyword"><a href="' . Visitor::getRootPage() . '/members/recherche.php?search=' . $keyword . '">' . $keyword . '</a></i> ';
                    }
                    echo '</td>';
                    $articles[] = $article->getId();
                }
                echo '</tr>';
                echo '</table>';
            }
        }
        ?>

    <h2>Sur le forum</h2>
    <?php
    $used = array();
    if(count($result['forum']) == 0) {
        echo 'Aucun forum correspondant à votre recherche n\'a été trouvé.';
    } else {
        echo '<table class="table table-hover forum-list" style="margin-top: 15px;">';
        foreach ($result['forum'] as $post) {
            $topic = $post->getTopic();
            if (!in_array($topic->getId(), $used)) {
                $used[] = $topic->getId();
                echo TopicForumViewer::getTopicsLine($topic, true);
            }
        }
        echo '</table>';
    }
?>
</div>