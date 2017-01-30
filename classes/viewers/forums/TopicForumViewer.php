<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 02/01/17
 * Time: 00:21
 */

namespace viewers\forums;


use models\forum\Topic;
use utils\Utils;
use Visitor;

class TopicForumViewer
{
    public static function getTopicsTable($topics) : string {
        $ret = '<table class="table table-hover forum-list" style="margin-top: 15px;">';
        foreach($topics as $topic) {
            $ret .= self::getTopicsLine($topic);
        }
        $ret .= '</table>';
        return $ret;
    }

    public static function getTopicsLine(Topic $topic, bool $displayForum=false) : string {
        $ret = '';
        if(!$topic->isHided() || ($topic->isHided() && Visitor::getInstance()->getUser()->isModerator())) {
            $ret .= '<tr class="'.($topic->hasRead(Visitor::getInstance()->getUser())?'read': 'unread').'" >';
            // If we have to display topic (we are moderator or the topic is not hided)
            $ret .= '<td>' .
                ($topic->isNew(Visitor::getInstance()->getUser()) ? '<i class="label label-info new">Nouveau</i> ' : '') .
                '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $topic->getId() . '">' .
                ($topic->isFollowedBy(Visitor::getInstance()->getUser()) ? '<i style="font-size: 9pt;" class="glyphicon glyphicon-star"></i>&nbsp;':'').
                ($topic->isHided() ? '<i class="glyphicon glyphicon-eye-close"></i>&nbsp;':'').
                ($topic->isLocked() ? '<i class="glyphicon glyphicon-lock"></i>&nbsp;' : '') . $topic->getTitle() . '</a><br>';
            if ($topic->getSubtitle() != null && $topic->getSubtitle() != "") {
                $ret .= '<p><em style="font-size: 10pt">' . $topic->getSubtitle() . '</em></p>';
            }
            $ret .= '<p style="font-size: 8pt">Par ' . $topic->getCreator()->getName() . ' le ' . Utils::getPlainDate($topic->getDate()) . '</p>';
            $ret .= '</td>';
            $nbPosts = $topic->getNbPosts(Visitor::getEntityManager());
            $lastPost = $topic->getLastPost(Visitor::getEntityManager());
            if(!$displayForum) {
                $ret .= '<td style="width: 100px;" class="forum-stats">' . $nbPosts . ' message' . ($nbPosts > 1 ? 's' : '') . '</td>';
            } else {
                $forum = $topic->getForum();
                $ret .= '<td style="width: 250px; font-size: 10pt" class"forum-stats">'.
                    '<a href="'.Visitor::getRootPage().'/members/forums/voir-forum.php?id='.$forum->getId().'">'.$forum->getName().'</a></td>';
            }
            if($lastPost != null) {
                $ret .= '<td class="forum-stats">Dernier message de <br/><b>' . $lastPost->getUser()->getName() . '</b> <br/>le ' . ($lastPost->getDate()->format('d/m/Y à H:i')) . '</td>';
            } else {
                $ret .= '<td class="forum-stats">Aucun message</td>';
            }
            $ret .= '</tr>';
        }
        return $ret;
    }
}