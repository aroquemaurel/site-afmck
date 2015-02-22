<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Le logiciel Bilan</h1>
    <div id="toc" class="toc"></div><!--/.well -->

    <div class="docformation">
        <div class="alert alert-warning">
            Le logiciel de Bilan MDT (développé par l'AFMcK) évolue. Profitez-en dès maintenant !
        </div>

        <div class="logiciel">
            <h2>Fonctionnalités</h2>
            <ul><li>Bilan Lombaire</li>
                <li>Bilan Cervical</li>
                <li>Bilan thoraciques</li>
                <li>Bilans membres supérieurs</li>
                <li>Bilans membres inférieurs</li>
                <li>Fiches de suivis</li>
                <li>Envoi de documents par e-mail</li>
                <li>Editions de PDF des bilans et des fiches de suivis</li>
            </ul>

            <h3>Les nouveautés</h3>
            <ul>
                <li>Toutes les fiches bilan MDT dont le périphérique</li>
                <li>Les fiches de liaisons médecin ajustées</li>
                <li>La possibilité d'envoyer des documents par mail</li>
                <li>L'adresse de contact en cas de problème d'installation ou d'utilisation: maintenance@afmck.fr.</li>
            </ul>
            <ul>
                <li>La nouvelle version (V1.6.7) du logiciel de bilan MDT est disponible pour les utilisateur de PC</li>
                <li>L'ancienne version (1.5.6) est toujours disponible pour les utilisateurs de Mac, en attendant la nouvelle !</li>
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


            <h3>A venir</h3>
            <ul>
                <li>les fiches périphériques et la transmission par mail directement depuis le logiciel !</li>
                <li>Une version pour les cabinets multi-praticien</li>
                <li>Analyse des données récoltées</li>
            </ul>
        </div><!-- fin de .logiciel -->

        <h2>Procédure d’installation</h2>

        <div>
            <ol>
                <li>Si vous avez déjà la version 2.5 faites une sauvedarde des données à un endroit de votre choix</li>
                <li>Choisissez votre système d'exploitation et téléchargez le logiciel en cliquant sur le lien suivant
                    <table><tr>
                            <td class="oslogo"><a href="http://downloads.joohoo.fr/bilanMDT_windows_telechargement.php"
                                                  target="_blank"><img src="<?php echo Visitor::getInstance()->getRootPage().
                                        "/docs/members/logiciels/Windows.png"?>" height="80" alt="vers win" /></a></td>
                            <td class="oslogo"><a href="http://downloads.joohoo.fr/bilanMDT_macOS_telechargement.php"
                                                  target="_blank"><img src="<?php echo Visitor::getInstance()->getRootPage().
                                        "/docs/members/logiciels/mac.jpg"?>" height="80" alt="mac" /></a></td></tr>
                    </table>
                </li>
                <li>Envoyez un mail à <a href="mailto:contact@afmck.fr">contact@afmck.fr</a> avec
                    <ul>
                        <li>Vos coordonnées (Nom, Prénom)</li>
                        <li>Votre numéro ADELI (9 chiffres)</li>
                    </ul>
                </li>
                <li>
                    Attendre le mail avec votre clé de dévérouillage pour installer le logiciel
                </li>
                <li>Installez le logiciel
                <ul>
                    <li>laissez le s'installer dans le dossier "programme" de votre ordinateur<br />(ou à l'endroit où vous avez installé la version précédente, si déjà fait)</li>
                    <li>enregistrez vos coordonnées complètes</li>
                    <li>précisez lui où sauvegarder les fichiers PDF (dans "document / bilan MDT", par exemple)</li>
                    <li>enregistrez votre clé lorsqu'il vous le demande.</li>
                    <li>lisez le document d’utilisation joint</li>
                </ul>
                    <?php
                    Image::miniTooltipLink(Visitor::getInstance()->getRootPage()."/docs/members/logiciels/", "installationEtMiseAJour_bilanMDT_AFMcK",
                                                                                    "Installation et configuration du logiciel permettant la gestion des bilans McKenzie", false);
                    ?>
                </li>
                <li>Faites vous plaisir !</li>
                <li>Donnez nous votre avis</li>
            </ol>
        </div> <!-- fin de .logiciel -->

        <div class="logiciel">
        </div><!-- fin de .logiciel -->
</div>
    </div>
