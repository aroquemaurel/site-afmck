<?php
declare(strict_types = 1);

namespace viewers;

use \utils\Pagination;
use \Visitor;
use \models\News;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 11/12/16
 * Time: 23:19
 */
class NewsViewer
{
    public function __construct() {

    }

    public static function getHtmlNew(News $new) {
        $ret = '<div style="padding-right: 80px">';
        $ret .= '<h2>' . $new->getTitle() . '&nbsp;<small>' . $new->getSubtitle() . '</small></h2>';
        $ret .= '<p style="margin-top: -8px;margin-bottom:15px"><small>Posté le ' . $new->getDate()->format('d / m / Y à H:i') . ' par ' . $new->getAuthor()->getFirstName() . ' ' . $new->getAuthor()->getLastname() . '</small></p>';
        $ret .= $new->getContent();
        $ret .= '</div>';

        if (count($new->getAttachments()) > 0) {
            $ret .= '<br/><div style="font-size:9.5pt">';
            $ret .= '<h5>Pièces jointes</h5>';
            $ret .= '<ul>';
            foreach ($new->getAttachments() as $att) {
                $ret .= '<li><i class="glyphicon glyphicon-download-alt"></i>&nbsp;<a href="' . Visitor::getInstance()->getRootPage() . '/docs/members/news/' . $att->getPath() . '">' . $att->getTitle() . '</a></li>';
            }
            $ret .= '</ul></div>';
        }

        return $ret;
    }

    public static function getHtmlNewsContents($news, int $page, int $nbPages) : string {
        $ret = '<div style="margin-bottom: 0px;">';
        (new Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/members/index.php'))->toString();
        $ret .= '</div>';

        foreach($news as $new) {
            $ret .= self::getHtmlNew($new);
        }
        $ret .= (new Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/members/index.php'))->toString();

        return $ret;
    }

    private static function getHtmlNewsListLine(News $new) {
        $ret = '';
        $ret .= '<tr href="'.Visitor::getInstance()->getRootPage().'/admin/user.php?id='.$new->getId().'">'.
            '<td>'.$new->getTitle().' <small>'.$new->getSubtitle().'</small></td>'.
            '<td><i class="glyphicon glyphicon-user"></i> '.($new->getAuthor()->getFirstname().' '.$new->getAuthor()->getLastname()).'</td>'.
            '<td>'.($new->getDate()->format('d/m/Y à H:i')).'</td>'.
            '<td>'.(
            !$new->isSend() ? ('<a href="'.Visitor::getInstance()->getRootPage().'/admin/envoyer-news.php?id='.$new->getId().'">
            <i class="glyphicon glyphicon-envelope"></i></a>')
                : '<i class="glyphicon glyphicon-envelope"></i>'
            ).
            '&nbsp;&nbsp;<a href="'.Visitor::getInstance()->getRootPage().'/admin/editer-news.php?id='.$new->getId().'">
            <i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;
            <a href="'.Visitor::getInstance()->getRootPage().'/admin/supprimer-news.php?id='.$new->getId().'">
            <i class="glyphicon glyphicon-trash"></i></a>
            </td>';
        $ret .= '</tr>';
        return $ret;
    }

    public static function getHtmlNewsList($news, $page, $nbPages) {
        $ret = (new Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/admin/list-news.php'))->toString();
        $ret .= '<table class="table table-striped">';
        $ret .= '<thead>';
        $ret .= '<tr>';
        $ret .= '<th>Titre</th>';
        $ret .= '<th>Auteur</th>';
        $ret .= '<th>Date</th>';
        $ret .= '<th>Actions</th>';
        $ret .= '</tr>';
        $ret .= '</thead>';
        $ret .= '<tbody>';

        foreach($news as $new) {
            $ret .= self::getHtmlNewsListLine($new);
        }
        $ret .= '        </tbody> </table>';
        return $ret;
    }
}