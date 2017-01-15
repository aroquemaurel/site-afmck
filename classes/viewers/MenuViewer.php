<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 15/01/17
 * Time: 16:54
 */

namespace viewers;


use models\User;
use Visitor;

class MenuViewer
{
    private static $OFFSET_HORIZONTAL = -15;

    private static $OFFSET_VERTICAL = -10;

    public static function getProfilMenu(User $user) : string {
        $ret = '<li class="dropdown" style="margin-left: '.self::$OFFSET_HORIZONTAL.'px">
            <a href="" data-toggle="dropdown" class="dropdown-toggle">' .
            '<i class="glyphicon glyphicon-user"></i>&nbsp;Profil&nbsp;<b class="caret"></b></a>';
        $ret .= '<ul class="dropdown-menu" role="menu" style="margin-top: '.self::$OFFSET_VERTICAL.'px">';
        $ret .= '<li><b>Mon profil</b></li>';
        $ret .= '<li><a href="'.Visitor::getRootPage().'/members/profil/mon-profil.php">Voir mon profil</a></li>';
        $ret .= '<li><a href="'.Visitor::getRootPage().'/members/profil/parameters.php">Modifier mes informations</a></li>';
        $ret .= '<li><a href="'.Visitor::getRootPage().'/members/profil/password.php">Changer de mot de passe</a></li>';
        $ret .= '<li><a href="'.Visitor::getRootPage().'/members/profil/changer-avatar.php">Changer d\'avatar</a></li>';
        $ret .= '<li><b>Mon adhésion</b></li>';
        $ret .= '<li><a href="'.Visitor::getRootPage().'/readherer.php">Réadhérer à l\'association</a></li>';
        if($user->getHasSigned() == -1) {
            $ret .= '<li><a href="' . Visitor::getRootPage() . '/members/signer-la-charte.php">Je souhaite signer la charte</a></li>';
        }
        $ret .= '<li><a href="'.Visitor::getRootPage().'/deconnexion.php">Déconnexion</a></li>';
        $ret .= '</ul>';
        $ret .= '</li>';

        return $ret;
    }

    public static function getNotificationMenu() : string {
        $ret ='<li class="dropdown" style="margin-left: 0px;"><a href="#"><i class="glyphicon glyphicon-bell"></i>&nbsp;&nbsp;';
        $ret .= '<span class="badge">' . 10 . '</span>&nbsp;<b class="caret"></b></a></li>';

        return $ret;
    }

    public static function getAdminMenu(User $user) : string {
        $accountsRights = $user->isInGroup("ADMINISTRATEUR") || $user->isInGroup("TRESORIER");
        $charteRights = $user->isInGroup("ADMINISTRATEUR") || $user->isInGroup("SECRETAIRE");
        $newsRights = $user->isInGroup("ADMINISTRATEUR") || $user->isInGroup("SECRETAIRE");
        $ret = '';

        if($accountsRights || $charteRights || $newsRights) {
            $ret .= '<li class="dropdown" style="margin-left: ' . self::$OFFSET_HORIZONTAL . 'px">';
            $ret .= '<a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="glyphicon glyphicon-wrench"></i>&nbsp;Admin&nbsp;<b class="caret"></b></a>';
            $ret .= '<ul class="dropdown-menu" role="menu" style="width: 220px;margin-top: ' . self::$OFFSET_VERTICAL . 'px">';

            // Registration management
            if ($accountsRights) {
                $ret .= '<li><b>Gestion des adhérents</b></li>';
                $ret .= '<li><a href="' . Visitor::getRootPage() . '/admin/validRegister.php">Validations inscriptions';
                $ret .= '</a></li>';
            }

            // Members list
            if ($user->isInGroup("SECRETAIRE") || $accountsRights) {
                $ret .= '<li><a href="' . Visitor::getRootPage() . '/admin/members.php">Liste des membres</a></li>';
            }

            // Charts management
            if ($charteRights) {
                $ret .= '<li><a href="' . Visitor::getRootPage() . '/admin/valider-signature-charte.php">Signataires de la charte';
                $ret .= '</a></li>';
            }

            // Newsletters management
            if ($newsRights) {
                $ret .= '<li><a href="' . Visitor::getRootPage() . '/admin/list-news.php">Gestion des newsletters</a></li>';
            }

            // All CA members
            if ($user->isInGroup("MEMBRE_CA") || $user->isInGroup("ADMINISTRATEUR")) {
                $ret .= '<li><b>Le Conseil d\'Administration</b></li>';
                if ($user->isInGroup("SECRETAIRE") || $user->isInGroup("ADMINISTRATEUR") | $user->isInGroup("PRESIDENT") || $user->isInGroup("TRESORIER")) {
                    $ret .= '<li><a href="' . Visitor::getRootPage() . '/admin/add-document.php">Ajouter un document</a></li>';
                }
                $ret .= '<li><a href="' . Visitor::getRootPage() . '/CA/liste-des-documents.php">Liste des documents</a></li>';
            }
            $ret .= '</ul>';
            $ret .= '</li>';
        }
        return $ret;
    }
}