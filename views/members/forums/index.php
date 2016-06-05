<?php use utils\Utils;

$breadcrumb->display()?>
<div class="container" style="">
    <h1><?php echo $title;?></h1>
    <table class="table table-hover forum-list" style="width: 99%;">
    <?php
    $catIt = 0;
    $catForum = 0;
    foreach($categories as $category) {
        $thereIsForum = false;
        foreach($category->getForums() as $forum) {
            if($forum->hasRights(Visitor::getInstance()->getUser())) {
               $thereIsForum = true;
                break;
            } 
        }

        if($thereIsForum) {
            echo '<tr style="background-color: #ebfaff">';
                echo '<th colspan="4">'.$category->getName().'</th>';
                if($title == 'Administration des forums') {
                    echo '<td style="width: 150px;">';
                    if($catIt != 0) {
                        echo '<a href="'.Visitor::getRootPage().'/admin/forums/deplacer.php?t=category&direction=monter&id='.$category->getId().'"><i class="glyphicon glyphicon-arrow-up"></i></a>';
                    } else {
                        echo '<i class="glyphicon glyphicon-arrow-up"></i>';
                    }
                    if($catIt != count($categories)-1) {
                        echo '<a href="'.Visitor::getRootPage().'/admin/forums/deplacer.php?t=category&direction=descendre&id='.$category->getId().'"><i class="glyphicon glyphicon-arrow-down"></i></a>';
                    } else {
                        echo '<i class="glyphicon glyphicon-arrow-down"></i>';
                    }
                    echo '<a href="#"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>';
                }
            echo '</tr>';
            foreach($category->getForums() as $forum) {
                if($forum->hasRights(Visitor::getInstance()->getUser())) {
                    echo '<tr class="' . ($forum->hasRead(Visitor::getInstance()->getUser()) || $title == 'Administration des forums' ? 'read' : 'unread') . '">';
                    echo '<td style="">';
                    if($title == 'Liste des forums') {
                        echo '<a href="' . Visitor::getRootPage() . '/members/forums/voir-forum.php?id=' . $forum->getId() . '">';
                    }
                    echo $forum->getName();
                    if($title == 'Liste des forums') {
                        echo '</a>';
                    }
                    echo '<p style="font-size: 9pt"><em>' . $forum->getDescription() . '</em>' .
                        '</p></td>';
                    $nbTopics = count($forum->getTopics(0, $entityManager));
                    $nbPosts = $forum->getNbPosts($entityManager);
                    echo '<td class="forum-stats" style="width: 100px;">' . $nbTopics . ' sujet' . ($nbTopics > 1 ? 's' : '') . '</td>';
                    echo '<td class="forum-stats" style="width: 100px;">' . $nbPosts . ' message' . ($nbPosts > 1 ? 's' : '') . '</td>';

                    if ($nbTopics > 0) {
                        if ($nbPosts > 0) {
                            $lastPost = $forum->getLastPost($entityManager);
                            echo '<td class="forum-stats">Dernier message de <br/><b>' . $lastPost->getUser()->getName() . '</b> <br/>le '
                                . ($lastPost->getDate()->format('d/m/Y à H:i')) . ' <br/>
                            Dans ';
                            if($title == 'Liste des forums') {
                                echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $lastPost->getTopic()->getId() . '">';
                            }
                            echo $lastPost->getTopic()->getTitle();
                            if($title == 'Liste des forums') {
                                echo '</a>';
                            }
                            echo '</td>';
                        } else {
                            echo '<td class="forum-stats">Aucun message</td>';
                        }
                    } else {
                        echo '<td class="forum-stats">Aucun message</td>';
                    }
                    if($title == 'Administration des forums' && Visitor::getInstance()->getUser()->isInGroup("ADMINISTRATEUR")) {
                        echo '<td style="width: 150px;">';
                        if($catForum != 0) {
                            echo '<a href="'.Visitor::getRootPage().'/admin/forums/deplacer.php?t=forum&direction=monter&id='.$forum->getId().'"><i class="glyphicon glyphicon-arrow-up"></i></a>';
                        } else {
                            echo '<i class="glyphicon glyphicon-arrow-up"></i>';
                        }

                        if($catForum != count($category->getForums())-1) {
                            echo '<a href="'.Visitor::getRootPage().'/admin/forums/deplacer.php?t=forum&direction=descendre&id='.$forum->getId().'"><i class="glyphicon glyphicon-arrow-down"></i></a>';
                        } else {
                            echo '<i class="glyphicon glyphicon-arrow-down"></i>';
                        }

                            echo '<a href="#"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="#"><i class="glyphicon glyphicon-remove"></i></a>
                        </td>';
                    }
                    echo '</tr>';
                }
                ++$catForum;
            }
            echo '</tr>';
        }
        ++$catIt;
        $catForum = 0;
    }
    ?>
    </table>
</div>
