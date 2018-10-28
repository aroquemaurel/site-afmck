<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 07/01/17
 * Time: 17:35
 */

namespace viewers\forums;


use utils\StringHelper;
use Visitor;

class ForumViewer
{
    public static function getTableForumsOfCategory($category, $isAdmin, $catIt, $categories=array()) {
        $catForum = 0;

        echo '<table class="table table-hover forum-list">';
        if($isAdmin) {
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
        foreach($category->getForums() as $forum) {
            if($forum->hasRights(Visitor::getInstance()->getUser())) {
                echo '<tr class="' . ($forum->hasRead(Visitor::getInstance()->getUser()) || $isAdmin ? 'read' : 'unread') . '">';
                echo '<td>';
                if(/*$title == 'Liste des forums'*/!$isAdmin) {
                    echo '<a href="' . Visitor::getRootPage() . '/members/forums/voir-forum.php?id=' . $forum->getId() . '">';
                }
                echo $forum->getName();
                if(/*$title == 'Liste des forums'*/!$isAdmin) {
                    echo '</a>';
                }
                echo '<p style="font-size: 9pt"><em>' . $forum->getDescription() . '</em>' .
                    '</p></td>';
                $nbTopics = count($forum->getTopics(0, Visitor::getEntityManager()));
                $nbPosts = $forum->getNbPosts(Visitor::getEntityManager());
                echo '<td class="forum-stats" style="width: 100px;">' . $nbTopics . ' sujet' . ($nbTopics > 1 ? 's' : '') . '</td>';
                echo '<td class="forum-stats" style="width: 100px;">' . $nbPosts . ' message' . ($nbPosts > 1 ? 's' : '') . '</td>';

                if ($nbTopics > 0) {
                    if ($nbPosts > 0) {
                        $lastPost = $forum->getLastPost(Visitor::getEntityManager());
                        echo '<td class="forum-stats">le '
                            . ($lastPost->getDate()->format('d/m/Y à H:i')) . ' <br/>
                            ';
                        if(!$isAdmin) {
                            echo '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $lastPost->getTopic()->getId() . '">';
                        }
                        echo StringHelper::trunkString($lastPost->getTopic()->getTitle(), 40);
                        if(!$isAdmin) {
                            echo '</a>';
                        }
                        echo '</td>';
                    } else {
                        echo '<td class="forum-stats">Aucun message</td>';
                    }
                } else {
                    echo '<td class="forum-stats">Aucun message</td>';
                }
                if($isAdmin && Visitor::getInstance()->getUser()->isInGroup("ADMINISTRATEUR")) {
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
        echo '</table>';
    }
}