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
                <li class="dropdown"><a href="" data-toggle="dropdown" class="dropdown-toggle">Connexion<b class="caret"></b></a>
                    <ul role="menu" class="dropdown-menu" style="padding: 10px">
                        <li>
                            <form>
                                <div class="form-group">
                                    <label for="inputEmail">Numéro ADELI</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Numéro ADELI">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Mot de passe</label>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox">Se souvenir de moi</label>
                                </div>
                                <div class="form-group" style="margin: auto;text-align: center">
                                    <button type="submit" class="btn btn-primary"">Se connecter</button>
                                </div>
                            </form>

                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
