<?php include('menu.php') ?>
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Méthode MDT<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/methodesMDT/prise-en-charge.php"> Prise en charge</a></li>
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/methodesMDT/faq.php"> FAQ</a></li>
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/methodesMDT/formation.php"> Formation</a></li>
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/methodesMDT/references.php"> Référence</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">AFMcK<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/AFMcK/adhesion.php"> Adhésion</a></li>
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/AFMcK/charte.php"> Charte</a></li>
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/AFMcK/qui-sommes-nous.php"> Qui sommes nous</a></li>
                        <li><a tabindex="-1" href="<?=Visitor::getRootPage();?>/AFMcK/comment-sinscrire.php"> Comment s'inscrire ?</a></li>
                    </ul>
                </li>
                <li><a href="<?=Visitor::getRootPage();?>/praticiens.php">Praticiens</a></li>
                <li><a href="<?=Visitor::getRootPage();?>/liens.php">Liens</a></li>
               <!-- <li class="members visible-xs"><a href="<?=Visitor::getRootPage();?>/connexion.php">Connexion</a></li>
                <li class="members visible-xs"><a href="<?=Visitor::getRootPage();?>/inscription.php">Inscription</a></li>
                -->
                </ul>
                <?php
                    include("connectionMenu.php");
                ?>
            </ul>

        </div>

    </div>
</div>

