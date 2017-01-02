<?php include('menu.php') ?>
<ul class="nav navbar-nav">
    <!-- Classic list -->
    <li class="dropdown"><a href="#"  data-toggle="dropdown" class="dropdown-toggle">Les travaux de l'association<b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu">
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/'?>">Le top des archives</a></li>
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/'?>">L'année en cours</a></li>
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/'?>">Les études de l'association</a></li>
            <li><a href="<?=Visitor::getRootPage().'/members/travaux-association/'?>">Les fiches bilan et d'exercices</a></li>
            <!-- TODO chemin -->
            <li><a href="<?=Visitor::getRootPage().'/members/outils-de-travail/documentations/com.php'?>">La communication sur le MDT</a></li>

            <!-- Content container to add padding -->
              <!--  <div class="yamm-content">
                    <div class="row">
                        <ul class="col-sm-2 list-unstyled">
                            <li>
                                <p><strong>Cas cliniques</strong></p>
                            </li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/travaux-association/cas-cliniques/rotulienne.php">Tendinite Rotulienne</a></li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/travaux-association/cas-cliniques/genou.php">Traitement d'un genou</a></li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/travaux-association/cas-cliniques/epaule.php">Traitement d'une épaule</a></li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/travaux-association/cas-cliniques/autres.php">Autres cas</a></li>
                        </ul>
                        <ul class="col-sm-3 list-unstyled">
                            <li>
                                <p><strong>Chroniques scientifiques</strong></p>
                            </li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°1_AFMcK.pdf" target="_blank">N°1 — Étude de cas hernie lombaire</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°2_AFMcK.pdf" target="_blank">N°2 — Étude Donelson 2012</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK n°3_AFMck.pdf" target="_blank">N°3 — Effet des mouvements sur le nucléus</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°4_AFMcK.pdf" target="_blank">N°4 — Étude de cas épaule - syndrome acromio-claviculaire</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°5_AFMcK.pdf" target="_blank">N°5 — Étude Rosedale 2014 - Genou</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°6_AFMcK.pdf" target="_blank">N°6 — Diagnostic pour Sacro-Iliaque</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/Algorithme_decisionnel_des_derangements_epaules.pdf" target="_blank">N°7 — Algorithme décisionnel pour dérangement épaule</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°8_AFMcK.pdf" target="_blank">N°8 — Récupération de la fonction</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°9_AFMcK.pdf" target="_blank">N°9 — Progression autour de l'extension de genou</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°10_AFMcK.pdf" target="_blank">N°10 — Progression/Régression des forces</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/news/ULTT.pdf" target="_blank">N°11 — ULTT : KESAKO ?</a></li>
                        </ul>
                        <ul class="col-sm-3 list-unstyled">
                            <li>
                                <p><strong>Trucs et astuces en MDT</strong></p>
                            </li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°1_AFMcK.pdf" target="_blank">N°1 — Extension lombaire active</a></li>
                                <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°2_AFMcK.pdf" target="_blank">N°2 — Extension lombaire avec SP des MI</a></li>
                                <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°3_AFMcK.pdf" target="_blank">N°3 — Extension lombaire en demie-charge</a></li>
                                <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°4_AFMcK.pdf" target="_blank">N°4 — Extension d'épaule coude fléchi</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°5_AFMcK.pdf" target="_blank">N°5 — Extension thoracique "au nœud"</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°6_AFMcK.pdf" target="_blank">N°6 — PD atypique pour dérangement lombaire asymétrique</a></li>
                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?=Visitor::getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°7_AFMcK.pdf" target="_blank">N°7 — Dérangement lombaire antérieur</a></li>

            </li>                                    </ul>
                        <ul class="col-sm-2 list-unstyled">
                            <li>
                                <p><strong>Études</strong></p>
                            </li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/travaux-association/etudes/prevalence-syndromes-mckenzie.php">Prévalence des syndromes McKenzie</a></li>
                        </ul>
                        <ul class="col-sm-2 list-unstyled">
                            <li>
                                <p><strong>Journées de l'association</strong></p>
                            </li>
                            <li><a href="<?=Visitor::getRootPage(); ?>/members/travaux-association/journees/brest.php">Brest 2013</a></li>
                            <li><a href="<?=Visitor::getRootPage(); ?>/members/travaux-association/journees/lyon.php">Lyon 2014</a></li>
                            <li><a href="<?=Visitor::getRootPage(); ?>/members/travaux-association/journees/lille.php">Lille 2015</a></li>
                            <li><a href="<?=Visitor::getRootPage(); ?>/members/travaux-association/journees/2016-montpellier.php">Montpellier 2016</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            -->
        </ul>
    </li>
    <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Outils de travail<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <!-- Content container to add padding -->
                <div class="yamm-content">
                    <div class="row">
                        <ul class="col-sm-4 list-unstyled">
                            <li>
                                <p><strong>Les documentations</strong></p>
                            </li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/documentations/fiches-bilan.php">Fiches Bilan</a></li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/documentations/fiches-exercices.php">Fiches d'exerices</a></li>
                        </ul>
                        <ul class="col-sm-4 list-unstyled">
                            <li>
                                <p><strong>Logiciel de Bilan MDT</strong></p>
                            </li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/logiciel/logiciel.php">Le logiciel</a></li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/logiciel/installation.php">Installation du logiciel</a></li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/logiciel/cle-deverrouillage.php">Obtenir la clé de déverrouillage</a></li>
                        </ul>
                        <ul class="col-sm-4 list-unstyled">
                            <li>
                                <p><strong>Partenariats</strong></p>
                            </li>

                            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/partenariats/materiel.php">Le matériel</a></li>
                            <li><a href="<?=Visitor::getRootPage();?>/members/outils-de-travail/partenariats/monsitekine.php">MonSiteKiné</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </li>
    <li class="dropdown"><a href="#"  data-toggle="dropdown" class="dropdown-toggle">Kiosque
            <b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu">
        <li><a href="<?=Visitor::getRootPage();?>/members/kiosque/articles-scientifiques.php">Articles scientifiques</a></li>
        <li><a href="http://www.mckenzieinstitute.org/clinicians/research-and-resources/mdt-world-press/" target="_blank"><i span class="glyphicon glyphicon-globe"></i> Institut McKenzie</a></li>
        <li><a href="<?=Visitor::getRootPage();?>/members/kiosque/newsletters-McKenzie.php">Newsletters de McKenzie International</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="<?=Visitor::getRootPage();?>/members/certification.php">Certification</a></li>

            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Annonces locales
                    <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a tabindex="-1" href="http://afmck.fr/members/forums/voir-forum.php?id=47"> Petites annonces</a></li>
                    <li><a tabindex="-1" href="http://afmck.fr/members/forums/index.php#forum-45"> Actions locales</a></li>
                </ul>
            </li>

            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Divers<b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/docs/members/charte des praticiens adherents AFMcK.pdf"> Charte AFMcK</a></li>
                    <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/members/forums/"> Forum</a></li>
                    <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/members/divers/com-interne.php"> Communication Interne</a></li>
                </ul>
            </li>
            <?php
            include("connectionMenu.php");
            ?>
</ul>
    </div>
    </div>
</div>
