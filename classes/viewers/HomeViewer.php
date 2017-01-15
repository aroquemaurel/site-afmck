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
                    src="'.Visitor::getRootPage().'/docs/members/kiosque/newsletters/mini/MDT%20World%20Press%20Newsletter%20Vol.4%20N3%20Francais.jpg"
                    />
                </span>';
        $ret .= '<span class="description">
                    <a href="'.Visitor::getRootPage().'/docs/members/kiosque/newsletters/MDT%20World%20Press%20Newsletter%20Vol.4%20N3%20Francais.pdf">
                        Newsletter Vol3 N°4 (Français)
                    </a>
                    <br/>
                    <a href="'.Visitor::getRootPage().'/docs/members/kiosque/newsletters/STartBackScreeningTool.zip">
                        Start Back Screening Tool
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
                        src="'.Visitor::getRootPage().'/docs/members/kiosque/newsletters/mini/MDT Newsletter_Vol 4 No 2-fr_AFMcK.jpg"/>
                </span>';
        $ret .= '<span class="description">
                    <a href="'.Visitor::getRootPage().'/docs/members/kiosque/newsletters/MDT Newsletter_Vol 3 No 4-fr_AFMcK.pdf">MDT Newsletter volume 4</a>
                </span>';
        $ret .= '</div>';

        $ret .='</div>';

        return $ret;
    }
}