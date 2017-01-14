<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 14/01/17
 * Time: 13:01
 */

namespace viewers;


use Visitor;

class AnnounceViewer
{

    public static function getAnnouncesList(array $announces) : string
    {
        $ret = '';
        foreach($announces as $announce) {
            $topic = $announce->getTopic();
            $ret .= '<a href="' . Visitor::getRootPage() . '/members/forums/sujets/voir.php?id=' . $topic->getId() . '">';
            $ret .= '<h3><i class="label label-primary">' . $announce->getType()->getLabel() . '</i>&nbsp; '.$announce->getTitle().' <small>' . $topic->getSubtitle() . '</small></h3>';
            $ret .= '<p style="font-size: 8pt">Par ' . $announce->getUser()->toString() . ' le ' . $topic->getDate()->format('d / m / Y à H:i') . '</p>';
            $ret .= '</a>';
        }

        return $ret;

    }
}