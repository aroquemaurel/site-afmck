<?php
$breadcrumb->display()?>
    <div class="container" style="">
        <?php
        echo '<h1>'.($topic->isLocked()? '<i class="glyphicon glyphicon-lock"></i>&nbsp;':'').$topic->getTitle().' <small>'.$topic->getSubtitle().' </small></h1>';

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

        foreach($topic->getPosts() as $post) {
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


            if ($post->isHided()) {
                echo '<i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;';
            } else {
                echo '<i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;';
            }


            /*                (Visitor::getInstance()->getUser()->isModerator() ?
                                '<a href="'.Visitor::getRootPage().'/members/forums/messages/modifier.php?id='.$post->getId().'">
                                <i class="glyphicon glyphicon-lock"></i></a>':''
                            ).
            */
            echo '</span>';
            echo '<span class="author-inline">'.$post->getUser()->getShortName().'</span>';
            echo '<span class="date">' . utils\Utils::getPlainDate($post->getDate()) . '</span>';
            if ($post->isHided()) {
                echo '<span class="message-hided">' .
                '</span>';
                echo '<div class="hided-post"><p><em>Réponse masquée par</em> '.$post->messageHided()->getUser()->getShortName().
                    ' <em>pour le motif suivant : '.($post->messageHided()->getMessage()) .'</em></p></div>';
            } else {
                echo '<div class="post">' . $post->getContent() . '</div>';
            }
            echo '</div>';
            echo '</div>';
        }
        ?>
        <hr/>

        <?php

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
