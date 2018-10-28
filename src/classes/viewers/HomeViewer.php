<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 28/12/16
 * Time: 00:59
 */

namespace viewers;


use Visitor;

class HomeViewer
{
    public static function getNewThings() : string {
        $ret = '<div class="changes-home">';
        $ret .= '<div class="bloc">';
        $ret .= '<span class="container-img img-rounded">
                    <img class=" img-news" 
                    src="'.Visitor::getRootPage().'/docs/members/kiosque/newsletters/traduction/mini/MDT Newsletter_Vol 5 No 1-fr_AFMcK.jpg"
                    />
                </span>';
        $ret .= '<span class="description">
                    <a href="'.Visitor::getRootPage().'/docs/members/kiosque/newsletters/traduction/MDT Newsletter_Vol 5 No 1-fr_AFMcK.pdf">
                        Newsletter Vol5 N°1 (Français)
                    </a>
                </span>';
        $ret .= '</div>';
        $ret .= '<div class="bloc">';
        $ret .= '<span class="container-img img-rounded">
                    <img class="img-news" src="'.Visitor::getRootPage().'/docs/members/afmckday/montpellier/Montpellier2016_cover.jpg" />
                </span>';

        $ret .= '<span class="description">
                    <a href="'.Visitor::getRootPage().'/members/travaux-association/journees/2016-montpellier.php">Intervention et bonus</a>
                    sont en ligne !
                </span>';
        $ret .= '</div>';

        $ret .= '<div class="bloc">';
        $ret .= '<span class="container-img img-rounded">
                    <img class="img-news"
                        src="'.Visitor::getRootPage().'/docs/members/chroniquesscientifiques/mini/Yellows_Flags_Définitif_V2.jpg"/>
                </span>';
        $ret .= '<span class="description">
                    <a href="'.Visitor::getRootPage().'/docs/members/chroniquesscientifiques/Yellows_Flags_Définitif_V2_corrigée.pdf">Chronique N°13 — Yello flags</a>
                </span>';
        $ret .= '</div>';

        $ret .='</div>';

        return $ret;
    }
}