<?php $breadcrumb->display()?>
<div class="container" style="">
    <h1>Sujet <?php echo $topic->getTitle(); ?> <small>créé par TODO</small></h1>
    <?php
    foreach($topic->getPosts() as $post) {
        echo '<div class="forum-post">'.$post->getContent().'</div>';
    }
    ?>

</div>