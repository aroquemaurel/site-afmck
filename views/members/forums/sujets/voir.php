<?php
$breadcrumb->display()?>
    <div class="container" style="">
        <?php
        echo '<h1>'.$topic->getTitle().' <small>'.$topic->getSubtitle().' </small></h1>';

        foreach($topic->getPosts() as $post) {
            echo '<div class="forum-post">'.
                '<div class="author">'.$post->getUser()->getFirstName().'<br/>'.$post->getUser()->getLastName().'</div>'.
                '<div class="message">'.
                ($topic->getCreator()->getId() == $post->getUser()->getId() ? "<span class='creator'>Auteur du sujet</span>" : "").
                '<span class="date">'.utils\Utils::getPlainDate($post->getDate()).'</span><div class="post">'.$post->getContent().'</div></div>'.
                '</div>';
        }
        ?>
        <hr/>
        <h2>Répondre au sujet « <?Php echo $topic->getTitle();?> »</h2>
        <form enctype="multipart/form-data"  role="form" method="post" action="<?php echo Visitor::getRootPage().'/members/forums/sujets/repondre.php';?>">
        <?php
            $titleBtn = "Répondre à ce sujet";
            include(Visitor::getRootPath().'/views/members/forums/createPost.php');
            echo '<input type="hidden" name="idTopic" value="'.$topic->getId().'"/>';
        ?>

        </form>
    </div>
