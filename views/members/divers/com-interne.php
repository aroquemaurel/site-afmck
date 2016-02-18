<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Communication Interne</h1>
    <div class="thumbnail with-caption toc" id="toc" style="text-align: left; margin-right: 300px; margin-top: -100px;">
    <img id="mini" alt="" style="text-align: center;margin:auto">
    <p id="description" style="font-size: 10pt"></p>
</div>

<ul>
        <?php
        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "POUVOIR AGO 2016",
            "Pouvoir AGO 2016 <small>Wilfried Serres (Secrétaire)</small>");

        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "Compta-2015",
            "Comptabilité 2015 <small>Anne-Marie GASTELLU-ETCHEGORRY (Trésorière)</small>");
        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "Rapport moral 2014 du President_AFMcK",
            "Rapport moral 2014 <small>Jacky OTERO (Président de l'AFMcK)</small>");
        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "Sondage de satisfaction-lyon 2014_AFMcK", "Sondage de satisfaction");
        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "Compta-2014-2015", "Comptabilité 2014 <small>Anne-Marie GASTELLU-ETCHEGORRY (Trésorière)</small>");
        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "AG_2015", "Assemblée Générale 2015 <br/><small>Jacky OTERO (Président) et Anne-Marie GASTELLU-ETCHEGORRY (Trésorière)</small>");
        ?>
    </ul>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
<?php
$script = Image::miniLinkJs();
?>
