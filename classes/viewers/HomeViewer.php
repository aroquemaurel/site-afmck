<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 28/12/16
 * Time: 00:59
 */

namespace viewers;


class HomeViewer
{
    public static function getNewThings() {
        return '<div class="changes-home">
<div class="bloc">
    <span class="container-img img-rounded">
<img class=" img-news" src="http://afmck.fr/docs/members/kiosque/newsletters/mini/MDT%20World%20Press%20Newsletter%20Vol.4%20N3%20Francais.jpg"
/>
</span>
    <span class="description">
<a href="http://afmck.fr/docs/members/kiosque/newsletters/MDT%20World%20Press%20Newsletter%20Vol.4%20N3%20Francais.pdf">
    Newsletter Vol3 N°4 (Français)
</a>
<br/>
<a href="http://afmck.fr/docs/members/kiosque/newsletters/STartBackScreeningTool.zip">
Start Back Screening Tool
</a>
</span>
</div>
    <div class="bloc">
<span class="container-img img-rounded">
    <img class="img-news" src="http://afmck.fr/docs/members/afmckday/montpellier/Montpellier2016_cover.jpg" />
</span>
<span class="description">
    <a href="http://afmck.fr/members/travaux-association/journees/2016-montpellier.php">Intervention et bonus</a>
    sont en ligne !
</span>
    </div>
    <div class="bloc">
    <span class="container-img img-rounded">
    <img class="img-news"
     src="<?=Visitor::getRootPage();?>/docs/members/kiosque/newsletters/mini/MDT Newsletter_Vol 4 No 2-fr_AFMcK.jpg"/>
    </span>
    <span class="description">
        <a href="<?= Visitor::getRootPage().\'/docs/members/kiosque/newsletters/MDT Newsletter_Vol 3 No 4-fr_AFMcK.pdf\'?>">MDT Newsletter volume 4</a>
    </span>
    </div>
</div>';
    }
}