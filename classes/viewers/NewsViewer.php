<?php
declare(strict_types = 1);

namespace viewers;

use utils\StringHelper;
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

    public static function getHtmlNew(News $new, int $size=-1) : string {
        $ret = '<div style="padding-right: 80px">';
        $ret .= '<h2>' . $new->getTitle() . '&nbsp;<small>' . $new->getSubtitle() . '</small></h2>';
        $ret .= '<p style="margin-top: -8px;margin-bottom:15px"><small>Posté le ' . $new->getDate()->format('d / m / Y à H:i') .
            ' par ' . $new->getAuthor()->getFirstName() . ' ' . $new->getAuthor()->getLastname() . '</small></p>';

        if($size == -1 || $size >= strlen($new->getContent())) {
            $ret .= $new->getContent();
            if (count($new->getAttachments()) > 0) {
                $ret .= '<br/><div style="font-size:9.5pt">';
                $ret .= '<h5>Pièces jointes</h5>';
                $ret .= self::getHtmlAttachmentsNews($new);
                $ret .= '</div>';
            }
        } else {
            $ret .= StringHelper::truncate($new->getContent(), $size, ['html' => true, 'ending' => '...', 'exact'=>false]);
            $ret .='<p style="text-align: center">';
            $ret .= '<button type="button" id="acceptBtn" class="btn btn-primary">';
            $ret .= '<i class="glyphicon glyphicon-ok-sign"></i>&nbsp;Lire l\'intégralité de la news</button></p>';
        }
        $ret .= '</div>';

        return $ret;
    }
    private static function getHtmlAttachmentsNews(News $new) : string {
        $ret = '<ul>';
        foreach ($new->getAttachments() as $att) {
            $ret .= '<li><i class="glyphicon glyphicon-download-alt"></i>&nbsp;<a href="' . Visitor::getInstance()->getRootPage() . '/docs/members/news/' . $att->getPath() . '">' . $att->getTitle() . '</a></li>';
        }
        $ret .= '</ul>';
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
        $ret .= '<tr href="'.Visitor::getInstance()->getRootPage().'/admin/user.php?id='.$new->getId().'">';
        $ret .=     '<td>'.$new->getTitle().' <small>'.$new->getSubtitle().'</small></td>';
        $ret .= '<td><i class="glyphicon glyphicon-user"></i> '.($new->getAuthor()->getFirstname().' '.$new->getAuthor()->getLastname()).'</td>';
        $ret .= '<td>'.($new->getDate()->format('d/m/Y à H:i')).'</td>';
        $ret .= '<td class="attachment">'.self::getHtmlAttachmentsNews($new).'</td>';
        $ret .= '<td>'.(
            !$new->isSend() ? ('<a href="'.Visitor::getInstance()->getRootPage().'/admin/envoyer-news.php?id='.$new->getId().'">
            <i class="glyphicon glyphicon-envelope"></i></a>')
                : '<i class="glyphicon glyphicon-envelope"></i>'
            );
        $ret .= '&nbsp;&nbsp;<a href="'.Visitor::getInstance()->getRootPage().'/admin/editer-news.php?id='.$new->getId().'">';
        $ret .= '<i class="glyphicon glyphicon-pencil"></i></a>&nbsp;&nbsp;';
        $ret .= '<a href="'.Visitor::getInstance()->getRootPage().'/admin/supprimer-news.php?id='.$new->getId().'">';
        $ret .= '<i class="glyphicon glyphicon-trash"></i></a>';
        $ret .= '</td>';
        $ret .= '</tr>';
        return $ret;
    }

    public static function getHtmlNewsList($news, $page, $nbPages) {
        $ret = (new Pagination($page, $nbPages, Visitor::getInstance()->getRootPage().'/admin/list-news.php'))->toString();
        $ret .= '<table class="table table-striped news-list">';
        $ret .= '<thead>';
        $ret .= '<tr>';
        $ret .= '<th>Titre</th>';
        $ret .= '<th>Auteur</th>';
        $ret .= '<th>Date</th>';
        $ret .= '<th>Pièces Jointes</th>';
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
