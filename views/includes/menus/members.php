<?php include('menu.php') ?>
            <ul class="nav navbar-nav">
                <!-- Classic dropdown -->
                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Accueil<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/index.php"> Visiteurs</a></li>
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/members/index.php"> Adhérents</a></li>
                    </ul>
                </li>
                <!-- Classic list -->
                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Travaux de l'association<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- Content container to add padding -->
                            <div class="yamm-content">
                                <div class="row">
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Cas cliniques</strong></p>
                                        </li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/travaux-association/cas-cliniques/rotulienne.php">Tendinite Rotulienne</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/travaux-association/cas-cliniques/genou.php">Traitement d'un genou</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/travaux-association/cas-cliniques/epaule.php">Traitement d'une épaule</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/travaux-association/cas-cliniques/autres.php">Autres cas</a></li>
                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Chroniques scientifiques</strong></p>
                                        </li>
<?php echo "<!-- /--------/  ".Visitor::getInstance()->getRootPage()."-->" ;?>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°1_AFMcK.pdf" target="_blank">Chronique N°1</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°2_AFMcK.pdf" target="_blank">Chronique N°2</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK n°3_AFMck.pdf" target="_blank">Chronique N°3</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°4_AFMcK.pdf" target="_blank">Chronique N°4</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°5_AFMcK.pdf" target="_blank">Chronique N°5</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°6_AFMcK.pdf" target="_blank">Chronique N°6</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/chroniquesscientifiques/Algorithme_decisionnel_des_derangements_epaules.pdf" target="_blank">Chronique N°7</a></li>
                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Trucs et astuces en MDT</strong></p>
                                        </li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°1_AFMcK.pdf" target="_blank">Trucs et Astuces N°1</a></li>
                                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°2_AFMcK.pdf" target="_blank">Trucs et Astuces N°2</a></li>
                                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°3_AFMcK.pdf" target="_blank">Trucs et Astuces N°3</a></li>
                                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°4_AFMcK.pdf" target="_blank">Trucs et Astuces N°4</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/trucsastuces/TRUCS et ASTUCES en MDT N°5_AFMcK.pdf" target="_blank">Trucs et Astuces N°5</a></li>
                                        </li>                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Études</strong></p>
                                        </li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/etudes/Etude AFMcK 2012 - Rachis Prevalence Des Syndromes McKenzie_AFMcK.pdf">Rachis prévalence des syndromes McKenzie</a></li>
                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Journées de l'association</strong></p>
                                        </li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage(); ?>/members/travaux-association/journees/brest.php">Brest 2013</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage(); ?>/members/travaux-association/journees/lyon.php">Lyon 2014</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage(); ?>/members/travaux-association/journees/lille.php">Lille 2015</a></li>
                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Annonces de remplacement</strong></p>
                                        </li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/travaux-association/annonces/ile-de-france.php">Île de France</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Outils de travail<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- Content container to add padding -->
                            <div class="yamm-content">
                                <div class="row">
                                    <ul class="col-sm-offset-2 col-sm-4 list-unstyled">
                                        <li>
                                            <p><strong>Les documentations</strong></p>
                                        </li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/outils-de-travail/documentations/fiches-bilan.php">Fiches Bilan</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/outils-de-travail/documentations/fiches-exercices.php">Fiches d'exerices</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/outils-de-travail/documentations/com.php">La com'</a></li>
                                    </ul>
                                    <ul class="col-sm-3 list-unstyled">
                                        <li>
                                            <p><strong>Autres outils</strong></p>
                                        </li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/outils-de-travail/autres-outils/materiel.php">Matériel</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/outils-de-travail/autres-outils/logiciels.php">Logiciels</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"  data-toggle="dropdown" class="dropdown-toggle">Kiosque
                        <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                    <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/kiosque/articles-scientifiques.php">Articles scientifiques</a></li>
                    <li><a href="http://www.mckenziemdt.org/MDTWorldPress/" target="_blank"><i span class="glyphicon glyphicon-globe"></i> Institut McKenzie</a></li>
                    <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/kiosque/newsletters-McKenzie.php">Newsletters de McKenzie International</a></li>
                    </ul>
                </li>
        <li class="dropdown"><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/certification.php">Certification</a></li>

                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Actualités en région
                        <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                       <!-- <li><a tabindex="-1" href="#"> APMK</a></li>-->
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/members/actualites-en-region/collaborations-locales.php"> Collaborations locales</a></li>
                        <!--<li><a tabindex="-1" href="#"> Divers</a></li>-->
                    </ul>
                </li>

                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Divers<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/members/charte des praticiens adherents AFMcK.pdf"> Charte AFMcK</a></li>
                        <li><a tabindex="-1" href="http://afmck.forumactif.org/login"> Forum</a></li>
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/members/divers/com-interne.php"> Communication Interne</a></li>
                        <!--<li><a tabindex="-1" href="#"> Partenaires</a></li>
                        <li><a tabindex="-1" href="#"> Nous contacter</a></li>-->
                    </ul>
                </li>
                <?php
                include("connectionMenu.php");
                ?>
        </div>
    </div>
</div>
