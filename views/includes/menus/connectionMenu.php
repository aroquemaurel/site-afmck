<ul class="members nav navbar-nav " style="font-size: 8pt;margin-top: -10px;max-width: 250px" xmlns:color="http://www.w3.org/1999/xhtml">
<?php
if(!Visitor::getInstance()->isConnected()) {
?>
<li class="hidden-xs dropdown"><a href="" data-toggle="dropdown"color: #ccc;"class="dropdown-toggle">Connexion<b class="caret"></b></a>
    <ul role="menu" class="dropdown-menu" style="padding: 10px">
        <li>
            <?php include(Visitor::getRootPath().'/views/includes/formConnexion.php'); ?>
        </li>
    </ul>
</li>
<li class="visible-xs"><a href="connexion.php" style="color: #ccc">Connexion</a></li>
<li class=""><a href="inscription.php" style="color: #ccc">S'inscrire</a></li>


<?php
} else {
    $db = new database\DatabaseUser();
    $user = Visitor::getInstance()->getUser();
    $accountsRights = $user->isInGroup("ADMINISTRATEUR") || $user->isInGroup("TRESORIER");
    $charteRights = $user->isInGroup("ADMINISTRATEUR") || $user->isInGroup("SECRETAIRE");
    $nbAccountToValid = $accountsRights ? $db->countUsersToValid() : 0;
    $nbCharteToValid = $charteRights ? $db->chartToValid() : 0;
    $nbAdmin = $nbAccountToValid + $nbCharteToValid;
	$newsRights = $user->isInGroup("ADMINISTRATEUR") || $user->isInGroup("SECRETAIRE");

    echo '<li class="dropdown"><a href="" data-toggle="dropdown" style="color: #ccc;"class="dropdown-toggle"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;'.
        Visitor::getInstance()->getUser()->toString();

    if($accountsRights || $charteRights) {
        if($nbAdmin > 0) {
            echo '&nbsp;<span class="badge">'.$nbAdmin.'</span>';
        }
}
        echo '<b class="caret"></b></a>
        <ul role="menu" class="dropdown-menu" style="padding: 10px">';


    if($accountsRights || $charteRights) {
        echo '<li><b>Administration</b></li>';
    }
    if($accountsRights) {
        echo '<li><a href="' . Visitor::getRootPage() . '/admin/validRegister.php">Validations inscriptions';
        if ($nbAccountToValid > 0) {
            echo '&nbsp;<span class="badge">' . $nbAccountToValid . '</span>';
        }
        echo '</a></li>';
    }
    if($user->isInGroup("SECRETAIRE") || $accountsRights) {
        echo '<li><a href="' . Visitor::getRootPage() . '/admin/members.php">Liste des membres</a></li>';
    }
    if($charteRights) {
        echo '<li><a href="' . Visitor::getRootPage() . '/admin/valider-signature-charte.php">Signataires de la charte';
        if ($nbCharteToValid > 0) {
            echo '&nbsp;<span class="badge">' . $nbCharteToValid . '</span>';
        }
        echo '</a></li>';
    }

	if($newsRights) {
		echo '<li><a href="'.Visitor::getRootPage().'/admin/list-news.php">Gestion des newsletters</a></li>';
	}
    if($user->isInGroup("MEMBRE_CA") || $user->isInGroup("ADMINISTRATEUR")) {
        echo '<li><b>Le Conseil d\'Administration</b></li>';
        if($user->isInGroup("SECRETAIRE")  || $user->isInGroup("ADMINISTRATEUR") | $user->isInGroup("PRESIDENT") || $user->isInGroup("TRESORIER")) {
            echo '<li><a href="'.Visitor::getRootPage().'/admin/add-document.php">Ajouter un document</a></li>';
        }
        echo '<li><a href="'.Visitor::getRootPage().'/CA/liste-des-documents.php">Liste des documents</a></li>';
    }
    if(Visitor::getInstance()->getUser()->getAdeliNumber() != "afmck") {
        echo '<li><b>Mon profil</b></li>';
        echo '<li><a href="'.Visitor::getRootPage().'/members/profil/mon-profil.php">Voir mon profil</a></li>';
        echo '<li><a href="'.Visitor::getRootPage().'/members/profil/parameters.php">Modifier mes informations</a></li>';
        echo '<li><a href="'.Visitor::getRootPage().'/members/profil/password.php">Changer de mot de passe</a></li>';
        echo '<li><a href="'.Visitor::getRootPage().'/members/profil/changer-avatar.php">Changer d\'avatar</a></li>';
        echo '<li><b>Mon adhésion</b></li>';
        echo '<li><a href="'.Visitor::getRootPage().'/readherer.php">Réadhérer à l\'association</a></li>';
        if(Visitor::getInstance()->getUser()->getHasSigned() == -1) {
            echo '<li><a href="' . Visitor::getRootPage() . '/members/signer-la-charte.php">Je souhaite signer la charte</a></li>';
        }
    }
    echo '<li><a href="'.Visitor::getRootPage().'/deconnexion.php">Déconnexion</a></li>';
        echo '</ul>';
}
?>
</ul>
