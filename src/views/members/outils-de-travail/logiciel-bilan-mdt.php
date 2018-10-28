<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Le logiciel de Bilan MDT</h1>
    <div id="toc" class="toc"></div><!--/.well -->

    <div class="docformation">
        <div class="alert alert-warning">
            Le logiciel de Bilan MDT (développé par l'AFMcK) évolue. Profitez-en dès maintenant !
        </div>

        <h2>Présentation du logiciel</h2>
            <h3>Fonctionnalités</h3>
            <ul><li>Bilan Lombaire</li>
                <li>Bilan Cervical</li>
                <li>Bilan thoracique</li>
                <li>Bilan membres supérieurs</li>
                <li>Bilan membres inférieurs</li>
                <li>Fiches de suivis</li>
                <li>Envoi de documents par e-mail</li>
                <li>Editions de PDF des bilans et des fiches de suivis</li>
            </ul>

            <h4>Les nouveautés</h4>
            <ul>
                <li>Toutes les fiches bilan MDT dont le périphérique</li>
                <li>Les fiches de liaison médecin ajustées</li>
                <li>La possibilité d'envoyer des documents par mail</li>
                <li>L'adresse de contact en cas de problème d'installation ou d'utilisation: maintenance@afmck.fr.</li>
            </ul>
            <ul>
                <li>La nouvelle version (V1.6.7) du logiciel de bilan MDT est disponible pour les utilisateurs de PC et Mac</li>
            </ul>

            <div class="bs-callout bs-callout-info">
                <p>Cette version permet de créer une fiche de liaison pour le médecin, ou le médecin conseil pour accompagner la DAP:</p>
            </div>
            <ul><li><b>Initiale</b>, si le patient vient vous voir pour la première fois et qu’il a déjà épuisé le référentiel (15 séances pour lombalgie et cervicalgie) chez un autre kiné. Cette fiche est pré remplie à partir du bilan initial MDT et vous pouvez ajuster ce qui manque.</li>
                <li><b>Intermédiaire</b> ou <b>finale</b>, si le patient a besoin de plus de séances et que vous avez épuisé le référentiel ou les séances prescrites =
                    elle récupère le diagnostic provisoire du bilan initial et vous laisse la possibilité de donner les précisions sur l’état du patient à la dernière séance et ce que vous préconisez.</li>
                <li>L’édition des PDF pour transmettre par mail via votre messagerie, ou l’imprimer.</li></ul>

            <div class="alert alert-warning"><p>Bon test et donnez nous votre avis,
                    en espérant satisfaire vos besoins</p>
                <p>En cas de problème avec le logiciel, veuillez envoyer un e-mail à l'adresse suivante : maintenance@afmck.fr</p>
            </div>


            <h4>A venir</h4>
            <ul>
                <li>Nouvelle interface</li>
                <li>Une version pour les cabinets multi-praticiens</li>
                <li>Analyse des données récoltées</li>
            </ul>
        </div><!-- fin de .logiciel -->

    <h2 id="licence">Obtenir la licence</h2>
    <div class="alert alert-info">
        <p>Vous souhaitez utiliser le logiciel de Bilan MDT ? Il va vous falloir une clé de déverrouillage du logiciel !</p>
    </div>

    <p>
        La clé de déverrouillage du logiciel vas vous permettre d'utiliser le logiciel autant que vous le souhaitez.<br/> Celle-ci
        est valable un an, ainsi pour avoir la clé pour l'année suivante, vous devrez refaire une demande via le bouton ci-dessous.
    </p>

    <div style="text-align: center">
        <p>
            <a href="<?= Visitor::getRootPage();?>/members/outils-de-travail/logiciel/obtenir-ma-cle.php">
                <button class="btn btn-lg btn-primary">Obtenir ma clé de déverrouillage</button>
            </a>
        </p>
    </div>
    <h2>Procédure d'installation</h2>
    <div class="alert alert-warning">
        <p>Si vous avez déjà une version du logiciel, et souhaitez passer à la version suivante,
            faites une sauvedarde des données à un endroit de votre choix.<br/>
            Ceci vous permettra de palier à un éventuel problème de migration.</p>
    </div>

    <h3>Téléchargement du logiciel</h3>
    Tout d'abord, téléchargez le logiciel en fonction de votre système d'exploitation :
    <ul>
        <li>&nbsp;&nbsp;<a href="http://afmck.fr/docs/members/logiciels/downloads/Windows/BilanMDT_windows_V1.6.8.exe"
                           target="_blank"><img src="<?= Visitor::getRootPage()."/docs/img/Windows.png"?>" height="25" alt="vers win" />&nbsp;BilanMDT pour Windows</a></li>
        <li><a href="http://afmck.fr/docs/members/logiciels/downloads/OS_X/BilanMDT_OS-X_V1.6.8.zip"
               target="_blank"><img src="<?= Visitor::getRootPage().
                "/docs/img/mac.jpg"?>" height="25" alt="mac" />BilanMDT pour Mac OS X</a></li>
    </ul>


    <h3>Obtention d'une licence</h3>
    <P>Afin d'utiliser correctement le logiciel de BilanMDT, vous devez être adhérent à l'Association Française McKenzie, et ainsi
        posséder une licence du logiciel.</P>
    <p>Afin d'obtenir votre licence du logiciel, vous devez vous rendre
        <a href="<?=Visitor::getRootPage().'/members/outils-de-travail/logiciel/obtenir-ma-cle.php'?>">ici</a></p>
    <p>Si vous ne souhaitez pas obtenir votre licence immédiatement, ou souhaitez tout d'abord essayer le logiciel, vous avez
        le droit à une version d'essai du logiciel. Cette version vous permet de créer 5 bilans différents, et de posséder 5 patients. Au dela de cette limite, vous n'aurez qu'un accès en lecture à vos données.
    </p>
    <h3>Installation du logiciel</h3>
    <div class="bs-callout bs-callout-info">
        <p>Le document ci-dessous détaille précisemment le fonctionnement de l'installation et du paramétrage de votre logiciel, merci de le lire en cas de problème :
        </p>
        <?php
        Image::miniTooltipLink(Visitor::getRootPage()."/docs/members/logiciels/", "installationEtMiseAJour_bilanMDT_AFMcK",
            "Installation et configuration du logiciel permettant la gestion des bilans McKenzie", false);
        ?>
    </div>
    <ul>
        <li>Laissez le s'installer dans le dossier "programme" de votre ordinateur<br />(ou à l'endroit où vous avez installé la version précédente, si déjà fait)</li>
        <li>Enregistrez vos coordonnées complètes</li>
        <li>Précisez lui où sauvegarder les fichiers PDF (dans "document / bilan MDT", par exemple)</li>
        <li>Précisez lui où sauvegarder vos données (dans "document / sauvegardes MDT", par exemple)</li>
        <li>Enregistrez votre clé lorsqu'il vous le demande.</li>
        <li>Lisez le document d'utilisation joint</li>
    </ul>

    <h3>Profitez du logiciel !</h3>
    <p>
        Une fois l'installation et le paramétrage du logiciel effectué, vous pouvez maintenant vous faire plaisir ! N'hésitez pas à donner votre avis !
    </p>

    <div class="alert alert-info"><p>Si vous rencontrez un soucis avec le logiciel, merci d'envoyer un e-mail à <a href="mailto:maintenance@afmck.fr">maintenance@afmck.fr</a></p></div>
</div>
