<?php
declare(strict_types = 1);
namespace utils;

use models\announces\Announce;

class AnnounceHelper {
    public static function getTopicTitleFromAnnounce(Announce $announce) : string {
        return '['.$announce->getType()->getLabel().'] '.$announce->getTown().' '.$announce->getPostalCode().' — '.$announce->getTitle();
    }

    public static function getTopicSubtitleFromAnnoune(Announce $announce) : string {
        return 'Dès le '.$announce->getDate()->format("d/m/Y").' / '.$announce->getDuration();
    }

    public static function getContentPostFromAnnounec(Announce $announce) : string {
        $content = '<h1>'.$announce->getType()->getLabel().' à '.$announce->getTown().'</h1>';
        $content .= '<ul>';
        $content .= '<li><b>Date de début :</b> '.$announce->getDate()->format("d/m/Y").' </li>';
        $content .= '<li><b>Durée :</b> '.$announce->getDuration().' </li>';
        $content .= '<li><b>Localisation:</b> '.$announce->getPostalCode().' '.$announce->getTown().' </li>';
        $content .= '</ul>';
        $content .= '<br/><br/>';
        $content .= $announce->getDescription();

        return $content;
    }
}