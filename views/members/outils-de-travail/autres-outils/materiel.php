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
        <!-- SANGLES----------------------------------------------------------------------------------------------------------------------------------------------- -->
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
        $folder = "/docs/members/materiel";
        Image::thumbnailsWithCaption($folder, "2015_Offre_Sangle_Americaine",
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
                Image::miniTooltipLink($folder, "2015 Offre Super Roll", "Offre spécial Super Roll");
                Image::miniTooltipLink($folder, "2015 Offre INTERNET", "Bon de commande « Offre Internet »");
                Image::miniTooltipLink($folder, "2015 Patient AFMcK", "Bon de commande « Offre Patient» ");
                ?>
            </ul>
        </div>

        <h4>Le pack 2013</h4>
        <div style="text-align : center;">
        <?php
        Image::thumbnails($folder.'/coussin3_AFMcK.jpg', 'http://www.essentiel-med.fr');
        Image::thumbnails($folder.'/coussin3_AFMcK.jpg', 'http://www.essentiel-med.fr');
        Image::thumbnails($folder.'/coussin3_AFMcK.jpg', 'http://www.essentiel-med.fr');echo '<br/>';
        Image::thumbnails($folder.'/coussin1_AFMcK.jpg', 'http://www.essentiel-med.fr');
        Image::thumbnails($folder.'/coussin4_AFMcK.jpg', 'http://www.essentiel-med.fr');
        Image::thumbnails($folder.'/coussin5_AFMcK.jpg', 'http://www.essentiel-med.fr');
        ?>
        </div>
        <div class="bs-callout bs-callout-info">
            <ul>
                <?php
                Image::miniTooltipLink($folder, "BON DE COMMANDE - PACK 2013_AFMcK", "Bon de commande « Pack 2013 »");
                ?>
            </ul>
        </div>


        <h4>Le pack découverte</h4>
        <div style="text-align : center;">
        <?php
            Image::thumbnails($folder.'/coussin3_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin4_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin5_AFMcK.jpg', 'http://www.essentiel-med.fr');echo '<br/>';
            Image::thumbnails($folder.'/coussin2_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin1_AFMcK.jpg', 'http://www.essentiel-med.fr');
            Image::thumbnails($folder.'/coussin13_AFMcK.jpg', 'http://www.essentiel-med.fr');
        ?>
        </div>
        <div class="bs-callout bs-callout-info">
            <ul>
                <?php
                Image::miniTooltipLink($folder, "BON DE COMMANDE - PACK DECOUVERTE 2014_AFMcK", "Bon de commande « Pack Découverte »");
                ?>
            </ul>
        </div>

        <h2>Mon <i>« sitekine.com »</i></h2>
        <p>L’AFMcK souhaite vous faire profiter de trois mois d’essai gratuits et sans engagement à
            <a href="http://www.monsitekine.com/" target="_blank">
                <img src="<?php echo Visitor::getInstance()->getRootPage()?>/docs/members/logositekine2.png" width="176" height="40" alt="logositekine.com" />
            </a>.
        </p>
        <p>MonsiteKiné.com soutient l’Association Française McKENZIE en reversant 1€ par mensualité payée.</p>
        <p>Vous pouvez consulter le site de démonstration de la méthode McKenzie
            <a href="http://saubin-nicolas-masseur-kinesitherapeute.fr/" target="_blank">en cliquant ici</a>.</p>

        <h3>Pourquoi MonsiteKiné ?</h3>
            <ul><li>Parce que MonsiteKiné, créateur de site internet, a été spécialement développé
                    pour les masseurs-kinésithérapeutes (photothèque, mots clés …)</li>
                <li>Parce que les sites MonsiteKiné sont multiplateformes (PC, tablettes, smartphones)</li>
                <li>Parce que MonsiteKiné vous permet de mettre à jour votre site à tout moment (changer un texte,
                    une photo, le modèle…)</li>
                <li>Parce que la formule avec abonnement et sans engagement de MonsiteKiné vous permettra
                    de bénéficier au fur et à mesure des mises à jour et des nouvelles fonctionnalités.</li>
            </ul>

            <h3>Comment procéder ?</h3>
            <ul><li>Rendez-vous sur MonSiteKiné.com.</li>
                <li>Enregistrez-vous avec le code suivant : 14MCKENZIE.</li>
                <li>Choisissez le modèle et renseignez vos coordonnées qui seront directement reportées sur votre site.</li>
                <li>Grâce aux textes et photos par défaut vous pouvez déjà le mettre en ligne !</li>
                <li>Avec le tableau de bord, vous pouvez maintenant le personnaliser à votre rythme : choix des photos, importation de photos personnelles, modification des textes…</li></ul>

        <div class="bs-callout bs-callout-info">
        <p>Si à l’issue de la période d’essai, vous ne souhaitez pas conserver votre site, il suffira...de ne rien faire !
            </p>Vous ne renseignez le moyen de paiement que lorsque vous avez décidé de conserver votre site.
            Dans tous les cas, vous pourrez résilier à tout moment.</p>
        </div>
            <h5>N’hésitez pas à nous contacter par mail ou téléphone au 0970440092 pour toutes informations ou aide à la création de votre site.</h5>
            <h5>A bientôt sur <a href="http://www.monsitekine.com/" target="_blank"><img src="<?php echo Visitor::getInstance()->getRootPage()?>/docs/members/logositekinept.png" width="88" height="20" alt="logo petit sitekine.com" /></a>.</h5>

</div>
</div><!-- fin de #sitekine -->
</div>
