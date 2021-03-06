<?php
use models\User;

/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 01/01/15
 * Time: 12:25
 */

class Mail {
    public static function getValidationRegistrationMail(User $user, $date) {
        return "Bonjour ".$user->getFirstName()." ".$user->getLastName().",<br/>
                Votre compte sur <a href=\"http://afmck.fr\">http://afmck.fr</a>
                a été validé et sera accessible jusqu'au $date !<br/>
                Vous pouvez maintenant vous connecter sur le site.<br/>
                Identifiant: ".$user->getAdeliNumber()."<br/>
                Mot de passe: Celui renseigné lors de l'inscription.<br/>
                Bonne visite sur le site.<br/><br/>

                Le bureau de l'AFMcK";
    }
    public static function getValidationSignature(User $user) {
        return "Bonjour ".$user->getFirstName()." ".$user->getLastName().",<br/>
                Nous avons le plaisir de vous annoncer que votre signature de la charte a été validée. <br/> 
                Vous devriez maintenant apparaître sur la carte des praticiens : si tel n'est pas le cas, où en cas de problèmes, vous pouvez répondre à cet-email.<br/><br/>

                Le bureau de l'AFMcK";
    }

    public static function getValidationMail(User $user) {
        return "Bonjour ".($user->getFirstName())." ".($user->getLastName()).",<br/>
                Vous venez de vous inscrire sur <a href=\"http://afmck.fr\">http://afmck.fr</a>.<br/>
                Afin de pouvoir vous connecter sur le site, votre compte devra être validé manuellement par un membre du CA,
                une fois votre paiement récéptionné. <br/><br/>

                Cependant, avant toute chose, vous devez valider votre adresse email, pour cela, veuillez cliquer sur le lien suivant : <br/>
                <a href=\"http://afmck.fr/validation.php?account=".$user->getAdeliNumber()."&validation=".$user->getHashMail()."\">
                    http://afmck.fr/validation.php?account=".$user->getAdeliNumber()."&validation=".$user->getHashMail()."
                    </a><br/><br/>
                    Si vous ne vous êtes pas inscrit sur le site, veuillez ignorer ce message. En cas de problèmes, vous pouvez envoyer un email à maintenance@afmck.fr.<br/><br/>

                    En vous souhaitant une bonne journée,<br/>
                    Le bureau de l'AFMcK";
    }
    public static function getForgetPassword($name, $param) {
        return ("Bonjour $name,<br/>
                Vous avez demandé un changement de mot de passe, vous pouvez changer de mot de passe à l'adresse suivante : <br/>
                <a href=\"http://afmck.fr/setpassword.php?$param\">
                http://afmck.fr/setpassword.php?$param
                </a><br/><br/>
                Le bureau de l'AFMcK");
    }

    public static function getNewReadhesionTresor(User $user) {
        return "Bonjour,
        Une nouvelle demande de réadhésion a eu lieu sur www.afmck.fr : <br/>
        Vous trouverez ci-joint sa fiche au format PDF. Une fois le paiement réceptionné, vous pourrez valider son compte
        via le site web.<br/><br/>
        <h2>".($user->getFirstName()." ".$user->getLastName())."</h2>".$user->toHtml(false)."<br/><br/>
        En vous souhaitant une bonne journée,<br/>
        Le bureau de l'AFMcK";
    }


    public static function getNewAccountTresor(User $user) {
        return "Bonjour,
        Une nouvelle inscription a eu lieu sur www.afmck.fr : <br/>
        Vous trouverez ci-joint sa fiche au format PDF. Une fois le paiement réceptionné, vous pourrez valider son compte
        via le site web.<br/><br/>
        <h2>".($user->getFirstName()." ".$user->getLastName())."</h2>".$user->toHtml(false)."<br/><br/>
        En vous souhaitant une bonne journée,<br/>
        Le bureau de l'AFMcK";
    }

    public static function getNewAccount(User $user) {
        $ret = "Bonjour,<br/>
        Vous vous êtes correctement inscris à l'AFMcK : <br/>
        Vous trouverez ci-joint votre fiche au format PDF, vous devez signer cette fiche et la retourner par courrier ou par mail à
        <a href=\"mailto:tresorerie@afmck.fr\">tresorerie@afmck.fr</a>.<br/><br/>";
        $ret .= $user->getPayment()->getExplainMessage($user);

        $ret .=
            "<h2>".($user->getFirstName()." ".$user->getLastName())."</h2>".$user->toHtml(false)."<br/><br/>
        En vous souhaitant une bonne journée,<br/>
        Le bureau de l'AFMcK";
        return utf8_decode($ret);
    }
    public static function getNewReadhesion(User $user) {
        $ret = "Bonjour,<br/>
        Votre demande de réadhésion a bien été prise en compte.<br/> <br/>
        Vous trouverez ci-joint votre fiche au format PDF, vous devez signer cette fiche et la retourner par courrier ou par mail à
        <a href=\"mailto:tresorerie@afmck.fr\">tresorerie@afmck.fr</a>.<br/><br/>";

        $ret .= $user->getPayment()->getExplainMessage($user);

        $ret .=
            "<h2>".($user->getFirstName()." ".$user->getLastName())."</h2>".$user->toHtml(false)."<br/><br/>
        En vous souhaitant une bonne journée,<br/>
        Le bureau de l'AFMcK";
        return $ret;
    }
    public static function getNewChartMail(User $user)
    {
        $ret = "Bonjour,<br/>
            Une nouvelle signature de charte a eu lieu et nécessite l'envoie d'une charte plastifiée.<br/>
            Cette charte est à destination de : <br/><br/>
            ".$user->getFirstName()." ".$user->getLastName()." n° Adeli ".$user->getAdeliNumber()."<br/>".
            "Email: ".$user->getMail()."<br/>".
            $user->getCompleteAddress();

        $ret.="<br/><br/>En vous souhaitant une bonne journée";
        return $ret;
    }
}
