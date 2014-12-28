<ul class="hidden-xs members nav navbar-nav ">

<?php
if(!Visitor::getInstance()->isConnected()) {
?>
<li class="dropdown"><a href="" data-toggle="dropdown" style="color: #ccc;"class="dropdown-toggle">Connexion<b class="caret"></b></a>
    <ul role="menu" class="dropdown-menu" style="padding: 10px">
        <li>
            <form action="connexion.php" method="post">
                <div class="form-group">
                    <label for="inputAdeli">Numéro ADELI</label>
                    <input type="string" name="inputAdeli" class="form-control" id="inputAdeli" placeholder="Numéro ADELI">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Mot de passe</label>
                    <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Mot de passe">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember">Se souvenir de moi</label>
                </div>
                <div class="form-group" style="margin: auto;text-align: center">
                    <button type="submit" class="btn btn-primary""><i class="glyphicon glyphicon-user"></i>&nbsp; Se connecter</button>
                </div>
            </form>
        </li>
    </ul>
</li>
<li><a href="inscription.php" style="color: #ccc">S'inscrire</a></li>
<?php
} else {
    $db = new DatabaseUser();
    $nbAdmin = $db->countUsersToValid();
    echo '<li class="dropdown"><a href="" data-toggle="dropdown" style="color: #ccc;"class="dropdown-toggle">'.
        Visitor::getInstance()->getUser()->getFirstName()[0]. ". " .Visitor::getInstance()->getUser()->getLastName();
        if($nbAdmin > 0) {
            echo '&nbsp;<span class="badge">'.$nbAdmin.'</span>';
        }
        echo '<b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu" style="padding: 10px">';

    if(Visitor::getInstance()->getUser()->isInGroup("ADMINISTRATEUR")) {
        echo '<li><a href="'.Visitor::getInstance()->getRootPage().'/admin/validRegister.php">Validations inscriptions';
        if($nbAdmin > 0) {
            echo '&nbsp;<span class="badge">'.$nbAdmin.'</span>';
        }
        echo '</a></li>';
        // TODO Add number of validation
    }
    echo '<li><a href="'.Visitor::getInstance()->getRootPage().'/deconnexion.php">Déconnexion</a></li>';
        echo '</ul>';
}
?>
</ul>