<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Recherche « <?= $search ?> »</h1>
    <ul>
    <?php
    $used = array();
    foreach($result['posts'] as $post) {
        $topic = $post->getTopic();

        if(!in_array($topic->getId(), $used)) {
            $used[] = $topic->getId();
            echo '<li>' . $topic->getTitle() . '</li>';
        }
    }

    foreach($result['topics'] as $topic) {
        if(!in_array($topic->getId(), $used)) {
            $used[] = $topic->getId();
            echo '<li>' . $topic->getTitle() . '</li>';
        }
    }
    echo '</ul>';
?>
</div>