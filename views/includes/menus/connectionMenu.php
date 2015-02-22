<ul class="members nav navbar-nav " style="font-size: 9pt;">

<?php
if(!Visitor::getInstance()->isConnected()) {
?>
<li class="hidden-xs dropdown"><a href="" data-toggle="dropdown"color: #ccc;"class="dropdown-toggle">Connexion<b class="caret"></b></a>
    <ul role="menu" class="dropdown-menu" style="padding: 10px">
        <li>
            <?php include(Visitor::getInstance()->getRootPath().'/views/includes/formConnexion.php'); ?>
        </li>
    </ul>
</li>
<li class="visible-xs"><a href="connexion.php" style="color: #ccc">Connexion</a></li>
<li class=""><a href="inscription.php" style="color: #ccc">S'inscrire</a></li>


<?php
} else {
    $db = new DatabaseUser();
    $nbAdmin = $db->countUsersToValid();
    echo '<li class="dropdown"><a href="" data-toggle="dropdown" style="color: #ccc;"class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;'.
        Visitor::getInstance()->getUser()->getFirstName()[0]. ". " .Visitor::getInstance()->getUser()->getLastName();
        if($nbAdmin > 0 && Visitor::getInstance()->getUser()->isInGroup("ADMINISTRATEUR")) {
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
        echo '<li><a href="'.Visitor::getInstance()->getRootPage().'/admin/members.php">Liste des membres';
    }
    if(Visitor::getInstance()->getUser()->getAdeliNumber() != "afmck") {
        echo '<li><a href="'.Visitor::getInstance()->getRootPage().'/members/parameters.php">Modifier mes informations</a></li>';
        echo '<li><a href="'.Visitor::getInstance()->getRootPage().'/members/password.php">Changer de mot de passe</a></li>';
    }
    echo '<li><a href="'.Visitor::getInstance()->getRootPage().'/deconnexion.php">Déconnexion</a></li>';
        echo '</ul>';
}
?>
</ul>
