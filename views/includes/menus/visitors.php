<?php include('menu.php') ?>
            <ul class="nav navbar-nav">
                <!-- Classic dropdown -->
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Accueil<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="index.php"> Visiteurs</a></li>
                        <?php
                        if(Visitor::getInstance()->isConnected()) {
                            echo '<li><a tabindex="-1" href="members/index.php"> Adhérents</a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Méthode MDT<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="01a_meth-prisecharge.php"> Prise en charge</a></li>
                        <li><a tabindex="-1" href="01b_meth-faq.php"> FAQ</a></li>
                        <li><a tabindex="-1" href="01c_meth-formation.php"> Formation</a></li>
                        <li><a tabindex="-1" href="01d_meth-references.php"> Référence</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">AFMcK<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="02a_afmck-adhesion.php"> Adhésion</a></li>
                        <li><a tabindex="-1" href="02b_afmck-charte.php"> Charte</a></li>
                        <li><a tabindex="-1" href="02c_afmck-quisomnous.php"> Qui sommes nous</a></li>
                    </ul>
                </li>
                <li><a href="03a_praticiens.php">Praticiens</a></li>
                <li><a href="04a_liens.php">Liens</a></li>
                <?php
                if(!Visitor::getInstance()->isConnected()) {
                    include("connectionMenu.php");
                } else {
                    echo '<li><a href="deconnexion.php">Déconnexion</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>
