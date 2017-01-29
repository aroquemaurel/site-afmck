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

    public static function getNotificationMenu($notifications) : string {
        $nbNotif = count($notifications);
            /*            $ret = '<li class="dropdown" style="margin-left: 0px;"><a href="#" data-toggle="dropdown" class="dropdown-toggle">';
                        $ret .= '<i class="glyphicon glyphicon-bell"></i>&nbsp;&nbsp;';
                        $ret .= '<span class="badge">' . count($notifications) . '</span>&nbsp;<b class="caret"></b></a>';
                        $ret .= '<ul class="dropdown-menu" role="menu" style="margin-top: '.self::$OFFSET_VERTICAL.'px">';

                        foreach($notifications as $notification) {
                            $ret .= '<li><a href="#"><b>'.$notification->getTitle().'</b><br/><small>'.$notification->getDescription().'</small></a>';
                        }
                        $ret .= '</ul>';
                        $ret .= '</li>';
                    } else {
                        $ret = '';
                    }
            */
            $ret = '<li class="dropdown yamm-fw" style="margin-left: 0px; '.($nbNotif != 0 ?'width:85px;': 'width:60px').'">';
            $ret .= '<a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true">';
            //Travaux de l\'association<b class="caret"></b></a>
            $ret .= '<i class="glyphicon glyphicon-bell"></i>&nbsp;&nbsp;';
            if($nbNotif != 0) {
                $ret .= '<span class="badge">' . count($notifications) . '&nbsp;</span>';
            }
            $ret .= '<b class="caret"></b></a>';
        if($nbNotif > 0) {
            $ret .= '
                    <ul class="dropdown-menu"  style="position: relative; padding-top: 0px; ">
                        <li style="width: 200px">
                            <!-- Content container to add padding -->
                            <div class="yamm-content"style="padding: 5px;">
                                <div class="row"   >
                                    <ul class="col-sm-2 list-unstyled">';
            foreach ($notifications as $notification) {
                $link = $notification->getLink();
                $link .= !strpos($notification->getLink(), '?') ? '?notif=' : '&notif=';
                $link .= $notification->getId();
                $ret .= '<li style="width: 190px;"><a href="' . $link . '"><b>' . $notification->getTitle() . '</b><br/><small>' . $notification->getDescription() . '</small></a>';
            }
            $ret .= '

            </ul>
                                </div>
                            </div>
                       </li>
                   </ul>';
        }
            $ret .= '
               </li>';
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