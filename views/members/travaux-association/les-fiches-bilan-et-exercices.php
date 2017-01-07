<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Les fiches bilans et exercices</h1>
    <div id="toc" class="toc"></div><!--/.well -->

    <h2>Fiches bilan</h2>
    <ul>
        <?php
        $folder = Visitor::getRootPage().'/docs/members/fichesbilan';
        Image::miniLink($folder, 'Bilan_Evaluation Rachis Lombaire_AFMcK', '<b>Fiche Bilan</b> Evaluation rachis lombaire', false);
        Image::miniLink($folder, 'Bilan_Evaluation Rachis Dorsal_AFMcK', '<b>Fiche Bilan</b> Evaluation rachis Dorsal', false);
        Image::miniLink($folder, 'Bilan-Evaluation Membres Inferieurs_AFMcK', '<b>Fiche Bilan</b> Membres inférieurs', false);
        Image::miniLink($folder, 'Bilan_Evaluation Rachis Cervical_AFMcK', '<b>Fiche Bilan</b> Evaluation rachis cervical', false);
        Image::miniLink($folder, 'Formulaire de suivi McKenzie_AFMcK', 'Fiche de suivi', false);
        ?>
    </ul>
</div>

<h2>Fiches d'exercices</h2>
    <div class="bs-callout bs-callout-warning">
        <p>Vous avez uniquement accès aux fiches d'exercices disponible pour votre niveau de formation.
        </p>
        <p>Vous avez actuellement le <b>niveau <?= Visitor::getInstance()->getUser()->getLevelFormationString();?></b></p>
    </div>

    <?php
    if(Visitor::getInstance()->getUser()->levelIsGreaterThan('A')) {
        ?>
        <!-- Level A+B -->
        <h3>Rachis Lombaire</h3>

        <h4>Principe de flexion</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de flexion DEBOUT AFMcK", "<b>Rachis Lombaire</b> Flexion Debout", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de flexion ASSIS AFMcK", "<b>Rachis Lombaire</b> Flexion Assis", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de flexion COUCHE AFMcK", "<b>Rachis Lombaire</b> Flexion Couché", false);
            ?>
        </ul>

        <h4>Principe d'extension</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension DEBOUT AFMcK",
                "<b>Rachis Lombaire</b> Extension Debout", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension dynamique AFMcK",
                "<b>Rachis Lombaire</b> Extension Dynamique", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension Glissement DROIT AFMcK",
                "<b>Rachis Lombaire</b> Extension Glissement Droit", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension Demi Grenouille DROITE AFMcK",
                "<b>Rachis Lombaire</b> Extension en « Demi Grenouille » Droit", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension avec sangle AFMcK",
                "<b>Rachis Lombaire</b> Extension Avec Sangle", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension statique AFMcK",
                "<b>Rachis Lombaire</b> Extension Statique", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension Glissement GAUCHE AFMcK",
                "<b>Rachis Lombaire</b> Glissement Gauche", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe d'extension Demi Grenouille GAUCHE AFMcK",
                "<b>Rachis Lombaire</b> Extension en « Demi Grenouille » Gauche", false);
            ?>
        </ul>
        <h4>Principe de glissement</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de Glissement DROIT Mur AFMcK",
                "<b>Rachis Lombaire</b> Glissement Droit Avec Mur", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de Glissement DROIT Porte AFMcK",
                "<b>Rachis Lombaire</b> Glissement Droit Avec Porte", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de Glissement GAUCHE Mur AFMcK",
                "<b>Rachis Lombaire</b> Glissement Gauche Avec Mur", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de Glissement GAUCHE Porte AFMcK",
                "<b>Rachis Lombaire</b> Glissement Gauche Avec Porte", false);
            ?>
        </ul>

        <h4>Principe de rotation</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de Rotation DROITE AFMcK",
                "<b>Rachis Lombaire</b> Rotation Droite", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE principe de Rotation GAUCHE AFMcK",
                "<b>Rachis Lombaire</b> Rotation Gauche", false);
            ?>
        </ul>

        <h4>Principe de réintroduction à la flexion</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE Reintroduction de la flexion DEBOUT AFMcK",
                "<b>Rachis Lombaire</b> AFMcRéintroduction De La Flexion Debout", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE Reintroduction de la flexion ASSIS AFMcK",
                "<b>Rachis Lombaire</b> Réintroduction De La Flexion Assis", false);
            Image::miniLink($folder . "/lombalgie/", "LOMBALGIE Reintroduction de la flexion COUCHE AFMcK",
                "<b>Rachis Lombaire</b> Flexion Couché", false);
            ?>
        </ul>

        <h3>Rachis dorsal / Thoracique</h3>
        <h4>Principe d'extension</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/dorsalgie/", "DORSALGIE principe d'extension Assis_AFMcK",
                "<b>Rachis Dorsal / Thoracique</b> Extension Assis", false);
            Image::miniLink($folder . "/dorsalgie/", "DORSALGIE principe d'extension Assis  contre dossier_AFMcK",
                "<b>Rachis Dorsal / Thoracique</b> Extension Assis Contre Dossier", false);
            Image::miniLink($folder . "/dorsalgie/", "DORSALGIE principe d'extension Assis contre Ballon_AFMcK",
                "<b>Rachis Dorsal / Thoracique</b> Extension Assis Contre Ballon", false);
            ?>
        </ul>

        <h4>Principe de rotation</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/dorsalgie/", "DORSALGIE principe de Rotation Droite assis_AFMcK",
                "<b>Rachis Dorsal / Thoracique</b> Rotation Doite Assis", false);
            Image::miniLink($folder . "/dorsalgie/", "DORSALGIE principe de Rotation Gauche assis_AFMcK",
                "<b>Rachis Dorsal / Thoracique</b> Rotation Gauche Assis", false);
            ?>
        </ul>

        <h3>Rachis Cervical</h3>
        <h4>Principe d'extension</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension Assis etape 1 AFMcK",
                "<b>Rachis Cervical</b> Extension Assis Etape 1", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension Assis etape 2 AFMcK",
                "<b>Rachis Cervical</b> Extension Assis Etape 2", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension Couche etape 1 AFMcK",
                "<b>Rachis Cervical</b> Extension Couché Etape 1", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension Assis etape 1 avec surpression AFMcK",
                "<b>Rachis Cervical</b> Extension Assis Etape 1 Avec Surpression", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension Assis etape 2 avec serviette AFMcK",
                "<b>Rachis Cervical</b> Extension Assis Etape 2 Avec Serviette", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension Couche etape 1 avec surpression AFMcK",
                "<b>Rachis Cervical</b> Extension Couché Etape 1 Avec Surpression", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension Couche etape 2 AFMcK",
                "<b>Rachis Cervical</b> Extension Couché Etape 2", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension en procubitus etape 1 AFMcK",
                "<b>Rachis Cervical</b> Extension En Procubitus Etape 1", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension en procubitus etape 1 avec surpression AFMcK",
                "<b>Rachis Cervical</b> Extension En Procubitus Etape 1 Avec Surpression", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'extension en procubitus etape 2 AFMcK",
                "<b>Rachis Cervical</b> Extension En Procubitus Etape 2", false);
            ?>
        </ul>

        <h4>Principe de rotation</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe de Rotation Droite Assis AFMcK",
                "<b>Rachis Cervical</b> Rotation Droite Assis", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe de Rotation Droite Couche AFMck",
                "<b>Rachis Cervical</b> Rotation Droite Couché", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe de Rotation Gauche Assis AFMcK",
                "<b>Rachis Cervical</b> Rotation Gauche Assis", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe de Rotation Gauche Couche AFMck",
                "<b>Rachis Cervical</b> Rotation Gauche Couché", false);
            ?>
        </ul>

        <h4>Principe d'inclinaison</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'inclinaison Droite Assis AFMck",
                "<b>Rachis Cervical</b> Inclinaison Droite Assis", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'inclinaison Droite surpression 2 mains Assis AFMck",
                "<b>Rachis Cervical</b> Inclinaison Droite Assis Surpression 2 Mains", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'inclinaison Droite Couche AFMck",
                "<b>Rachis Cervical</b> Inclinaison Droite Couché", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'inclinaison Gauche Assis AFMcK",
                "<b>Rachis Cervical</b> Inclinaison Gauche Assis", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'inclinaison Gauche surpression 2 mains Assis AFMck",
                "<b>Rachis Cervical</b> Inclinaison Gauche Assis Surpression 2 Mains", false);
            Image::miniLink($folder . "/cervicale/", "CERVICALGIE principe d'inclinaison Gauche Couche AFMck",
                "<b>Rachis Cervical</b> Inclinaison Gauche Couché", false);
            ?>
        </ul>
        <?php
    }

    if(Visitor::getInstance()->getUser()->levelIsGreaterThan('C')) {
        ?>
        <!-- Level C -->
        <h3>Membres inférieurs</h3>
        <h4>Dérangement du Genou</h4>
        <h5>Principe d'extension</h5>
        <ul>
            <?php
            Image::miniLink($folder . "/articperif", "Derangement GENOU en Extension en décharge_AFMcK",
                "<b>Dérangement du genou</b> Extension En Décharge", false);
            Image::miniLink($folder . "/articperif", "Derangement GENOU en Extension en charge_AFMcK",
                "<b>Dérangement du genou</b> Extension En Charge", false);
            Image::miniLink($folder . "/articperif", "Derangement GENOU en Extension avec surpression_AFMcK",
                "<b>Dérangement du genou</b> Extension Avec Surpression", false);
            ?>
        </ul>

        <h4>Dérangement de la Hanche</h4>
        <h5>Principe d'abduction</h5>
        <ul>
            <?php
            Image::miniLink($folder . "/hanches", "Derangement HANCHE en ABDUCTION en charge niveau 1_AFMcK",
                "<b>Dérangement de la hanche</b> Abduction En Charge Niveau 1", false);
            //  Image::miniLink($folder . "/hanches", "Derangement HANCHE en ABDUCTION HORIZONTALE contre RESISTANCE 1_AFMcK",
            //    "<b>Dérangement de la hanche</b> Abduction Horizontale Contre Résistance (Sangle)");
            Image::miniLink($folder . "/hanches", "Derangement HANCHE en ABDUCTION HORIZONTALE en Decharge 1_AFMcK",
                "<b>Dérangement de la hanche</b> Abduction Horizontale En Décharge", false);
            Image::miniLink($folder . "/hanches", "Derangement HANCHE en ABDUCTION en charge niveau 2_AFMcK",
                "<b>Dérangement de la hanche</b> Abduction En Charge Niveau 2", false);
            ?>
        </ul>

        <h5>Principe d'adduction</h5>
        <ul>
            <?php
            //            Image::miniLink($folder . "/hanches", "Derangement HANCHE en ADDUCTION HORIZONTALE contre RESISTANCE 2_AFMcK",
            //              "<b>Dérangement de la hanche</b> Adduction Horizontale Contre Résistance (Ballon)");
            Image::miniLink($folder . "/hanches", "Derangement HANCHE en ADDUCTION HORIZONTALE en Decharge 2_AFMcK",
                "<b>Dérangement de la hanche</b> Adduction Horizontale En Décharge", false);
            ?>
        </ul>
        <h5>Principe d'extension</h5>
        <ul>
            <?php
            Image::miniLink($folder . "/hanches", "Derangement HANCHE en Extension_AFMcK",
                "<b>Dérangement de la hanche</b> Extension En Charge", false);
            Image::miniLink($folder . "/hanches", "Derangement HANCHE en Extension en Adduction_AFMcK",
                "<b>Dérangement de la hanche</b> Extension En Adduction En Charge", false);
            Image::miniLink($folder . "/hanches", "Derangement HANCHE en Extension en Rotation Interne_AFMcK",
                "<b>Dérangement de la hanche</b> Extension En Rotation Interne En Charge", false);
            ?>
        </ul>

        <h5>Principe de flexion</h5>
        <ul>
            <?php
            //            Image::miniLink($folder . "/hanches", "Derangement GENOU en FLEXION Assis_AFMcK",
            //              "<b>Dérangement du genou</b> Flexion Assis");
            Image::miniLink($folder . "/articperif", "Derangement GENOU en Flexion debout_AFMcK",
                "<b>Dérangement du genou</b> Flexion Debout", false);
            Image::miniLink($folder . "/articperif", "Derangement GENOU en Flexion en charge_AFMcK",
                "<b>Dérangement du genou</b> Flexion En Charge", false);
            ?>
        </ul>

        <h4>Dérangement de la cheville</h4>
        <ul>
            <?php
            Image::miniLink($folder . "/cheville", "Dérangement Cheville FLEXION DORSALE en Charge",
                "<b>Dérangement de la cheville</b> Flexion Dorsale en charge", false);
            Image::miniLink($folder . "/cheville", "Dérangement Cheville FLEXION PLANTAIRE avec Surpression",
                "<b>Dérangement de la cheville</b> Flexion plantaire avec supression", false);
            Image::miniLink($folder . "/cheville", "Dérangement Cheville FLEXION DORSALE en Décharge",
                "<b>Dérangement de la cheville</b> Flexion dorsale en décharge", false);
            Image::miniLink($folder . "/cheville", "Dérangement Cheville FLEXION PLANTAIRE en Décharge",
                "<b>Dérangement de la cheville</b> Flexion plantaire en décharge", false);
            ?>
        </ul>

        <?php
    }
    ?>
    <!-- Level D -
    <h2>Dérangement des membres supérieurs</h2>
    -->

</div>
<?php
// $script = Image::miniLinkJs();
?>