<?php

use viewers\forums\TopicForumViewer;

$breadcrumb->display()?>
<div class="container-fluid">
    <h1>Recherche « <?= $search ?> »</h1>
    Dans&nbsp;&nbsp;
    <form method="get" action="?" style="display: inline">
        <select class="selectpicker form-control input-mini" name="levelFormation" style="display: inline;width:20%">
            <option value="1">Tout le site</option>
            <option value="2">Les articles du site</option>
            <option value="3">Le forum</option>
        </select>
    </form>
    <h2>Les articles du site</h2>
    <h2>Sur le forum</h2>
    <?php
    echo '<table class="table table-hover forum-list" style="margin-top: 15px;">';
    $used = array();
    echo '<table class="table table-hover forum-list" style="margin-top: 15px;">';
    foreach($result['posts'] as $post) {
        $topic = $post->getTopic();
        if(!in_array($topic->getId(), $used)) {
            $used[] = $topic->getId();
            echo TopicForumViewer::getTopicsLine($topic);
        }
    }

    foreach($result['topics'] as $topic) {
        if(!in_array($topic->getId(), $used)) {
            $used[] = $topic->getId();
            echo TopicForumViewer::getTopicsLine($topic);
        }
    }
    echo '</table>';
?>
</div>