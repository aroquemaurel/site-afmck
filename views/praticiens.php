    <?php $breadcrumb->display()?>
    <div class="container-fluid">
        <div id="toc" class="toc"></div>
        <h1>Praticiens MDT</h1>

        <div class="introcarte">
        <p>En cliquant sur le département de votre choix,<br />vous accéderez à une liste de praticiens adhérents à notre association<br />et ayant signé une <a href="<?php echo Visitor::getInstance()->getRootPage();?>/AFMcK/charte.php" target="_blank">charte de bonne pratique</a>.</p>
            <div class="bs-callout bs-callout-warning">
                <p>Selon leur niveau ils sont en cours de formation (Niveau C ou D), formés (Certifiés) ou Instructeurs diplômés (DIP).</p>
            </div>
    </div><!-- fin de .introcarte -->
    <div class="carte">
        <?php
        $mapChemin = 'france_map_3.0/'; // Chemin du dossier FranceMap relatif au ficher dans lequel vous faites l'include

        $urlExec = $_SERVER['PHP_SELF'];
        include($mapChemin.'map.php');
        ?>
    </div><!-- fin de .carte -->
        <p>&nbsp;<br/>&nbsp;</p>

    </div>
