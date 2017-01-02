<?php
use viewers\Pagination;
use viewers\forums\PostViewer;

    $breadcrumb->display()?>
    <div class="container" style="">
        <?php
        echo '<h1>'.($topic->isLocked()? '<i class="glyphicon glyphicon-lock"></i>&nbsp;':'').$topic->getTitle().' <small>'.$topic->getSubtitle().' </small></h1>';

        if($topic->isFollowedBy(Visitor::getInstance()->getUser())) {
            echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/suivre.php?suivre=0&id=' . $topic->getId() . '">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-star-empty"></i>&nbsp;Ne plus suivre le sujet</button></a>';
        } else {
            echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/suivre.php?suivre=1&id=' . $topic->getId() . '">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-star"></i>&nbsp;Suivre le sujet</button></a>';
        }

        if(Visitor::getInstance()->getUser()->isModerator()) {
            if($topic->isLocked()) {
                echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/verrouiller.php?verrouiller=0&id=' . $topic->getId() . '">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-lock"></i>&nbsp;Déverrouiller le sujet</button></a>';
            } else {
                echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/verrouiller.php?verrouiller=1&id=' . $topic->getId() . '">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-lock"></i>&nbsp;Verrouiller le sujet</button></a>';
            }

            if($topic->isHided()) {
                echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/masquer.php?masquer=0&id=' . $topic->getId() . '">
                    <button class="btn btn-default"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Réafficher le sujet</button></a>';
            } else {
                echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/masquer.php?masquer=1&id=' . $topic->getId() . '">
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-eye-close"></i>&nbsp;Masquer le sujet</button></a>';
            }
            echo'<div style="margin-bottom: 20px;"></div>';
        }

        $posts = $topic->getPosts(($currentPage-1)*FORUM_NB_POSTS_TOPIC, $entityManager);

        $p = new Pagination($currentPage,
            Pagination::getNbPages($posts->count(), FORUM_NB_POSTS_TOPIC),
            Visitor::getRootPage().'/members/forums/sujets/voir.php?id='.$topic->getId());

        echo $p->toString();
        foreach($posts as $post) {
            echo '<div class="forum-post '.($post->isHided()?'hided':'').'">' .
                '<div class="author">
                    <div class="thumbnail" style="width: 110px; margin: auto;text-align: center">
                <img width="100px" src="' . $post->getUser()->getAvatar() . '"/></div>
                <p id="description" style="font-size: 10pt">' .
                $post->getUser()->getFirstName() . '<br/>' . $post->getUser()->getLastName() .
                '</p>
                </div>' .
                '<div class="message ">' .
                ($topic->getCreator()->getId() == $post->getUser()->getId() ? "<span class='creator'>Auteur du sujet</span>" : "") .
                '<span class="toolbar">';

            if ($post->getUser()->getId() == Visitor::getInstance()->getUser()->getId() || Visitor::getInstance()->getUser()->isModerator()) {
                if (!$topic->isLocked() || Visitor::getInstance()->getUser()->isModerator()) {
                    echo '<a href="' . Visitor::getRootPage() . '/members/forums/messages/modifier.php?id=' . $post->getId() . '">' .
                        '<i class="glyphicon glyphicon-edit"></i></a>&nbsp;&nbsp;';
                } else {
                    echo '<i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;';
                }
            }


            if((Visitor::getInstance()->getUser()->isModerator() || Visitor::getInstance()->getUser()->getId() == $post->getUser()->getId()) &&
                $post->getId() != $topic->getFirstPost($entityManager)->getId()) {
                if ($post->isHided()) {
                    echo '<a href="'.Visitor::getRootPage().'/members/forums/messages/masquer.php?id='.$post->getId().'&masquer=0"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;&nbsp;</a>';
                } else {
                    echo '<a href="'.Visitor::getRootPage().'/members/forums/messages/masquer.php?id='.$post->getId().'&masquer=1"><i class="glyphicon glyphicon-eye-close"></i>&nbsp;&nbsp;</a>';
                }
            }


            echo '</span>';
            echo '<span class="author-inline">'.$post->getUser()->getShortName().'</span>';
            echo '<span class="date">' . utils\Utils::getPlainDate($post->getDate()) . '</span>';
            if ($post->isHided()) {
                echo '<span class="message-hided">' .
                '</span>';
                echo '<div class="hided-post"><p><em>Réponse masquée par</em> '.$post->messageHided()->getUser()->getShortName().
                    ' <em>pour le motif suivant : '.($post->messageHided()->getMessage()) .'</em></p></div>';
            } else {
                echo '<div class="post">' . utils\Style::replaceSmileys($post->getContent());
                echo PostViewer::getAprovement($post, Visitor::getInstance()->getUser());
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
        echo $p->toString();
        echo '<hr/>';

        if(!$topic->isLocked() || Visitor::getInstance()->getUser()->isModerator()) {
            echo '<h2>Répondre au sujet « ' . $topic->getTitle() . ' »</h2>';
            if($topic->isLocked()) {
                echo '<div class="alert alert-warning" style="text-align: center">Le sujet est actuellement verouillé. Seul les modérateurs peuvent ajouter de nouveaux messages.</div>';
            }
            echo '

        <form enctype="multipart/form-data"  role="form" method="post" action="' . Visitor::getRootPage() . '/members/forums/messages/nouveau.php">';
            $titleBtn = "Répondre à ce sujet";
            $post = null;
            include(Visitor::getRootPath() . '/views/members/forums/createPost.php');
            echo '<input type="hidden" name="idTopic" value="' . $topic->getId() . '"/>';

            echo '</form>';
        } else {
            echo '<div class="alert alert-danger" style="text-align: center;">Vous ne pouvez pas répondre à ce sujet, celui-ci est verrouillé.</div>';
        }
        ?>
    </div>
