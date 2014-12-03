<!-- Demo navbar -->
<div class="navbar yamm navbar-default navbar-fixed-top" style="height:110px;background-color: #273f64;">
    <div class="container">
        <div class="navbar-header" style="float:left">
            <button type="button" data-toggle="collapse"
                    data-target="#navbar-collapse-1"
                    class="navbar-toggle" style="margin-top: 30px">
		<img src="style/img/mobile-btn.png" width="30px"/></button><a href="index.php"
                                                class="navbar-brand"><img style="margin-top: -10px"src="style/img/logo.png" height="100px"
                                                                          alt="AFMcK" /></a>
        </div>
        <div id="navbar-collapse-1" class="navbar-collapse collapse" style="margin-top: 60px; margin-left: 100px;">
            <ul class="nav navbar-nav">
                <!-- Classic dropdown -->
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Accueil<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a tabindex="-1" href="index.php"> Visiteurs</a></li>
                        <li><a tabindex="-1" href="#"> Adhérents</a></li>
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
                if(Visitor::getInstance()->isConnected()) {
                    include("connectionMenu.php");
                }
                ?>
            </ul>
        </div>
    </div>
</div>
