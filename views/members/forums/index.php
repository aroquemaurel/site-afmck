<?php use utils\Utils;

$breadcrumb->display()?>
<div class="container" style="">
    <h1>Liste des forums</h1>
    <table class="table table-hover forum-list" style="width: 99%;">
    <?php
    foreach($categories as $category) {
        echo '<tr style="background-color: #ebfaff">';
            echo '<th colspan="4">'.$category->getName().'</th>';
        echo '</tr>';
        foreach($category->getForums() as $forum) {
            echo '<tr class="'.($forum->hasRead(Visitor::getInstance()->getUser())?'read': 'unread').'">';
            echo '<td style=""><a href="'.Visitor::getRootPage().'/members/forums/voir-forum.php?id='.$forum->getId().'">'.$forum->getName().
                    '</a><p style="font-size: 9pt"><em>'.$forum->getDescription().'</em>'.
                '</p></td>';
            $nbTopics = count($forum->getTopics());
            $nbPosts = $forum->getNbPosts();
            echo '<td class="forum-stats" style="width: 100px;">' . $nbTopics . ' sujet' . ($nbTopics > 1 ? 's' : '') . '</td>';
            echo '<td class="forum-stats" style="width: 100px;">' . $nbPosts . ' message' . ($nbPosts > 1 ? 's' : '') . '</td>';

            if($nbTopics > 0) {
                $lastTopic = $forum->getTopics()[$nbTopics - 1];
                $nbPosts = count($lastTopic->getPosts());
                if($nbPosts > 0) {
                    $lastPost = $lastTopic->getPosts()[$nbPosts - 1];
                    echo '<td class="forum-stats">Dernier message de <br/><b>' . $lastPost->getUser()->getName() . '</b> <br/>le '
                        . ($lastPost->getDate()->format('d/m/Y à h:i')) . ' <br/>
                        Dans <a href="'.Visitor::getRootPage().'/members/forums/sujets/voir.php?id='.$lastTopic->getId().'">'.$lastTopic->getTitle().'</a></td>';
                } else {
                    echo '<td class="forum-stats">Aucun message</td>';
                }
            } else {
                echo '<td class="forum-stats">Aucun message</td>';
            }
            echo '</tr>';
        }
        echo '</tr>';
    }
    ?>
    </table>
</div>