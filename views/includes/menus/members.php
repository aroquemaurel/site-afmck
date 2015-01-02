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
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/casclinique_rotulienne.php">Tendinite Rotulienne</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/casclinique_genou.php">Traitement d'un genou</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/casclinique_epaule.php">Traitement d'une épaule</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/casclinique_autres.php">Autres cas</a></li>
                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Chroniques scientifiques</strong></p>
                                        </li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°1_AFMcK.pdf" target="_blank">Chronique N°1</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°2_AFMcK.pdf" target="_blank">Chronique N°2</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK n°3_AFMck.pdf" target="_blank">Chronique N°3</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°4_AFMcK.pdf" target="_blank">Chronique N°4</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°5_AFMcK.pdf" target="_blank">Chronique N°5</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/chroniquesscientifiques/La Chronique Scientifique de l'AFMcK N°6_AFMcK.pdf" target="_blank">Chronique N°6</a></li>
                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Trucs et astuces en MDT</strong></p>
                                        </li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/trucsastuces/TRUCS et ASTUCES en MDT N°1_AFMcK.pdf" target="_blank">Trucs et Astuces N°1</a></li>
                                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/trucsastuces/TRUCS et ASTUCES en MDT N°2_AFMcK.pdf" target="_blank">Trucs et Astuces N°2</a></li>
                                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/trucsastuces/TRUCS et ASTUCES en MDT N°3_AFMcK.pdf" target="_blank">Trucs et Astuces N°3</a></li>
                                            <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/trucsastuces/TRUCS et ASTUCES en MDT N°4_AFMcK.pdf" target="_blank">Trucs et Astuces N°4</a></li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/trucsastuces/TRUCS et ASTUCES en MDT N°5_AFMcK.pdf" target="_blank">Trucs et Astuces N°5</a></li>
                                        </li>                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Études</strong></p>
                                        </li>
                                        <li><i class="glyphicon glyphicon-download-alt"></i> <a href="<?php echo Visitor::getInstance()->getRootPage();?>/docs/etudes/Etude AFMcK 2012 - Rachis Prevalence Des Syndromes McKenzie_AFMcK.pdf">Rachis prévalence des syndromes McKenzie</a></li>
                                    </ul>
                                    <ul class="col-sm-2 list-unstyled">
                                        <li>
                                            <p><strong>Journées de l'association</strong></p>
                                        </li>
                                        <li><a href="journees_brest.php">Brest 2012</a></li>
                                        <li><a href="journees_lyon.php">Lyon 2013</a></li>
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
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/fichesbilan.php">Fiches Bilan</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/fichesexercices.php">Fiches d'exerices</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/com.php">La com'</a></li>
                                    </ul>
                                    <ul class="col-sm-3 list-unstyled">
                                        <li>
                                            <p><strong>Autres outils</strong></p>
                                        </li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/materiel.php">Matériel</a></li>
                                        <li><a href="<?php echo Visitor::getInstance()->getRootPage();?>/members/logiciels.php">Logiciels</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown"><a href="kiosque.php">Kiosque</a>
                </li>
                <li class="dropdown"><a href="certification.php">Certification</a></li>

                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Actualités en région
                        <b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="/members/charte.php"> Charte AFMcK</a></li>
                        <li><a tabindex="-1" href="http://afmck.forumactif.org/login"> Forum</a></li>
                        <li><a tabindex="-1" href="/members/cominterne.php"> Communication Interne</a></li>
                        <li><a tabindex="-1" href="/members/partenaires.php"> Partenaires</a></li>
                        <li><a tabindex="-1" href="/members/contact.php"> Nous contacter</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Divers<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="/members/charte.php"> Charte AFMcK</a></li>
                        <li><a tabindex="-1" href="http://afmck.forumactif.org/login"> Forum</a></li>
                        <li><a tabindex="-1" href="/members/cominterne.php"> Communication Interne</a></li>
                        <li><a tabindex="-1" href="/members/partenaires.php"> Partenaires</a></li>
                        <li><a tabindex="-1" href="/members/contact.php"> Nous contacter</a></li>
                    </ul>
                </li>
                <?php
                include("connectionMenu.php");
                ?>
        </div>
    </div>
</div>
