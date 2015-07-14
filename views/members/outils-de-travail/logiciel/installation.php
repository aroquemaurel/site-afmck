<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Installation du logiciel de Bilan MDT</h1>
    <div id="toc" class="toc"></div><!--/.well -->
    <div class="alert alert-warning">
        <p>Si vous avez déjà une version du logiciel, et souhaitez passer à la version suivante,
            faites une sauvedarde des données à un endroit de votre choix.<br/>
        Ceci vous permettra de palier à un éventuel problème de migration.</p>
    </div>
    <h2>Téléchargement du logiciel</h2>
    Tout d'abord, téléchargez le logiciel en fonction de votre système d'exploitation :
    <ul>
        <li>&nbsp;&nbsp;<a href="http://afmck.fr/docs/members/logiciels/downloads/Windows/BilanMDT_windows_V1.6.8.exe"
               target="_blank"><img src="<?php echo Visitor::getInstance()->getRootPage().
                    "/docs/members/logiciels/Windows.png"?>" height="25" alt="vers win" />&nbsp;BilanMDT pour Windows</a></li>
        <li><a href="http://afmck.fr/docs/members/logiciels/downloads/OS_X/BilanMDT_OS-X_V1.6.8.zip"
               target="_blank"><img src="<?php echo Visitor::getInstance()->getRootPage().
                    "/docs/members/logiciels/mac.jpg"?>" height="25" alt="mac" />BilanMDT pour Mac OS X</a></li>
    </ul>


    <h2>Obtention d'une licence</h2>
    <P>Afin d'utiliser correctement le logiciel de BilanMDT, vous devez être adhérent à l'Association Française McKenzie, et ainsi
    posséder une licence du logiciel.</P>
    <p>Afin d'obtenir votre licence du logiciel, vous devez vous rendre sur la page
        <a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/outils-de-travail/logiciel/cle-deverrouillage.php">suivante</a></p>
    <p>Si vous ne souhaitez pas obtenir votre licence immédiatement, ou souhaitez tout d'abord essayer le logiciel, vous avez
    le droit à une version d'essai du logiciel. Cette version vous permet de créer 5 bilans différents, et de posséder 5 patients. Au dela de cette limite, vous n'aurez qu'un accès en lecture à vos données.
    </p>
    <h2>Installation du logiciel</h2>
    <div class="bs-callout bs-callout-info">
        <p>Le document ci-dessous détaille précisemment le fonctionnement de l'installation et du paramétrage de votre logiciel, merci de le lire en cas de problème :
        </p>
        <?php
        Image::miniTooltipLink(Visitor::getInstance()->getRootPage()."/docs/members/logiciels/", "installationEtMiseAJour_bilanMDT_AFMcK",
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

    <h2>Profitez du logiciel !</h2>
    <p>
        Une fois l'installation et le paramétrage du logiciel effectué, vous pouvez maintenant vous faire plaisir ! N'hésitez pas à donner votre avis !
    </p>

    <div class="alert alert-info"><p>Si vous rencontrez un soucis avec le logiciel, merci d'envoyer un e-mail à <a href="mailto:maintenance@afmck.fr">maintenance@afmck.fr</a></p></div>

</div>
