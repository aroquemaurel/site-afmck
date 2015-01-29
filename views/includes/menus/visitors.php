<?php include('menu.php') ?>
            <ul class="nav navbar-nav">
                <!-- Classic dropdown -->
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Accueil<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="index.php"> Visiteurs</a></li>
                        <?php
                        if(Visitor::getInstance()->isConnected()) {
                            echo '<li><a tabindex="-1" href="'.Visitor::getInstance()->getRootPage().'/members/index.php"> Adhérents</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Méthode MDT<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/methodesMDT/prise-en-charge.php"> Prise en charge</a></li>
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/methodesMDT/faq.php"> FAQ</a></li>
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/methodesMDT/formation.php"> Formation</a></li>
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/methodesMDT/references.php"> Référence</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">AFMcK<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/02a_afmck-adhesion.php"> Adhésion</a></li>
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/02b_afmck-charte.php"> Charte</a></li>
                        <li><a tabindex="-1" href="<?php echo Visitor::getInstance()->getRootPage();?>/02c_afmck-quisomnous.php"> Qui sommes nous</a></li>
                    </ul>
                </li>
                <li><a href="03a_praticiens.php">Praticiens</a></li>
                <li><a href="04a_liens.php">Liens</a></li>
               <!-- <li class="members visible-xs"><a href="<?php echo Visitor::getInstance()->getRootPage();?>/connexion.php">Connexion</a></li>
                <li class="members visible-xs"><a href="<?php echo Visitor::getInstance()->getRootPage();?>/inscription.php">Inscription</a></li>
                -->
                </ul>
                <?php
                    include("connectionMenu.php");
                ?>
            </ul>

        </div>

    </div>
</div>

