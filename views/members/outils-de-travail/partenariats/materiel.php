<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Le matériel</h1>
    <div id="toc" class="toc"></div><!--/.well -->

    <div class="bs-callout bs-callout-warning">
    <p>Toutes les offres référencées ci-dessous, ont été négociées auprès de nos partenaires.<br/>
        Elles permettent aux adhérents de l'AFMcK de bénéficier de tarifs préferentiels, tout en participant au financement de l'association.<br />
        Merci pour votre soutien !
    </p>
    <p>Codes pour profiter des offres:<br />Kiné AFMcK: AFM2014 / Patient AFMcK: Kenzie2014</p>
    </div>

    <div class="docformation">
        <!-- SANGLES-->
        <h2>Essentiel Medical</h2>
        <div style="text-align: center">
        <div class="thumbnail with-caption" style="text-align: center">
            <a href="http://www.essentiel-med.fr/PrestaShop1/">
                <img src="<?php echo Visitor::getInstance()->getRootPage()."/docs/members/materiel/logo3 essentiel.png";?>" />
            </a>
            <p style="font-size: 10pt"><a href="http://www.essentiel-med.fr/PrestaShop1/">
                    <i class="glyphicon glyphicon-globe"></i>&nbsp; Essentiel-med
                    </a><small>http://www.essentiel-med.fr/PrestaShop1/</small></p>
        </div>
        </div>
        <h3>Les Sangles</h3>
        <h4>Sangle americaine</h4>
        <div class="bs-callout bs-callout-info">longueur 8 pieds soit 2,44 mètres</div>
        <div style="text-align: center">
        <?php
        $folder = "docs/members/materiel";
        Image::thumbnailsWithCaption($folder, "2016 Offre Sangle Américaine",
            "Bon de commande Sangle américaine", "<a href=\"http://www.essentiel-med.fr\">Essentiel Medical. <br/>http://www.essentiel-med.fr</a>");
        ?>
        </div>
        <!-- COUSSINS ----------------------------------------------------------------------------------------------------------------------------------------------- -->
        <h3>Les Coussins</h3>
        <h4>Coussins au détail</h4>
            <?php
            Image::thumbnails($folder.'/coussin1_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin5_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin3_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin4_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin2_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin9_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin6_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin7_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin8_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin10_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin11_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin12_AFMcK.jpg', 'http://www.essentiel-med.fr');
            ?>

        <div class="bs-callout bs-callout-info">
            <ul>
                <?php
                Image::miniTooltipLink($folder, "2016 Offre Super Roll", "Offre spécial Super Roll");
                Image::miniTooltipLink($folder, "2016 Offre INTERNET", "Bon de commande « Offre Internet »");
                Image::miniTooltipLink($folder, "2016 Patient AFMcK", "Bon de commande « Offre Patient» ");
                ?>
            </ul>
        </div>

        <h4>Le pack découverte 2016</h4>
        <div style="text-align : center;">
        <?php
            Image::thumbnails($folder.'/coussin1_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin3_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin4_AFMcK.jpg', 'http://www.essentiel-med.fr');echo '<br/>';
            Image::thumbnails($folder.'/coussin2_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin3_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin13_AFMcK.jpg', 'http://www.essentiel-med.fr');
        ?>
        </div>
        <div class="bs-callout bs-callout-info">
            <ul>
                <?php
                Image::miniTooltipLink($folder, "2016 Pack Découverte", "Bon de commande « Pack Découverte »");
                ?>
            </ul>
        </div>


</div>
</div>
