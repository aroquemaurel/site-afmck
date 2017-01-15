<ul class="members nav navbar-nav " style="font-size: 8pt;margin-top: -10px;max-width: 250px;margin-left: 5px" xmlns:color="http://www.w3.org/1999/xhtml">
<?php
use viewers\MenuViewer;

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
//    $nbAccountToValid = $accountsRights ? $db->countUsersToValid() : 0;
  //  $nbCharteToValid = $charteRights ? $db->chartToValid() : 0;
    //$nbAdmin = $nbAccountToValid + $nbCharteToValid;

    echo MenuViewer::getNotificationMenu();
    echo MenuViewer::getProfilMenu(Visitor::getInstance()->getUser());
    echo MenuViewer::getAdminMenu(Visitor::getInstance()->getUser());
}
?>

</ul>

