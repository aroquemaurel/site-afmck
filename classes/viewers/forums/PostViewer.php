<?php
declare(strict_types = 1);

namespace viewers\forums;
use models\forum\Post;
use models\User;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 26/12/16
 * Time: 16:38
 */
class PostViewer
{
    public static function getAprovement(Post $post, User $user) {
        $useragree = $post->doesUserAgreed($user);
        $userdisagree = $post->doesUserDisagreed($user);
        $nbAgree = $post->getNbApprovement();
        $nbDisAgree = $post->getNbDisagreed();

        $canVote = !$useragree && !$userdisagree;
        $str = '';
        $str .= '<div class="bottom">';

        if($canVote) { // add link
            $str .= '<a href="'.\Visitor::getRootPage().'/members/forums/messages/approuver.php?id='.$post->getId().'">';
        } else if($useragree) {
            $str .= '<a href="'.\Visitor::getRootPage().'/members/forums/messages/supprimer-approbation.php?id='.$post->getId().'">';
        }
        $str .= '<span class="plus"><span class="';

        if($nbAgree > $nbDisAgree) { // style of best counter
            $str .= 'best ';
        }

        if($nbAgree != 0) { // thereis vote
            $str .= 'activate ';
        }
        $str .= '">';
        $str .= '<i class="'.($useragree ? 'fa fa-thumbs-up' : 'fa fa-thumbs-o-up').'" ></i>';

        if($nbAgree != 0) {
            $str .= '&nbsp;+ ' . $nbAgree;
        }
        $str .= '</span></span>';

        if($canVote||$useragree) {
            $str .= '</a>';
        }

        if($canVote) { // add link
            $str .= '<a href="'.\Visitor::getRootPage().'/members/forums/messages/desapprouver.php?id='.$post->getId().'">';
        } else if($userdisagree) {
            $str .= '<a href="'.\Visitor::getRootPage().'/members/forums/messages/supprimer-approbation.php?id='.$post->getId().'">';
        }
        $str .= '<span class="minus"><span class="';
        if($nbDisAgree > $nbAgree) { // style of best counter
            $str .= 'best ';
        }

        if($nbDisAgree != 0) { // thereis vote
            $str .= 'activate ';
        }
        $str .= '">';
        $str .= '<i class="'.($userdisagree ? 'fa fa-thumbs-down' : 'fa fa-thumbs-o-down').'" ></i>';

        if($nbDisAgree != 0) {
            $str .= '&nbsp;- ' . $nbDisAgree;
        }
        $str .= '</span></span>';

        if($canVote || $userdisagree) {
            $str .= '</a>';
        }



        $str .= '</div>';

        return $str;
    }
}