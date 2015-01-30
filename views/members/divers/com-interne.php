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
            "Rapport moral 2014 du President_AFMcK",
            "Rapport moral 2014 <small>Jacky OTERO (Président de l'AFMcK)</small>");
        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "Sondage de satisfaction-lyon 2014_AFMcK", "Sondage de satisfaction");
        Image::miniLink(Visitor::getInstance()->getRootPage()."/docs/members/cominterne",
            "Compta-2014-2015", "Compta-2014-2015");
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