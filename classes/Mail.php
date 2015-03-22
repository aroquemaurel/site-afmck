<?php
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

                Vous devriez maintenant apparaître sur la carte des praticiens : si tel n'est pas le cas, où en cas de problèmes, vous pouvez répondre à cet-email<br/>.

                Le bureau de l'AFMcK";
    }

    public static function getValidationMail(User $user) {
        return "Bonjour ".($user->getFirstName())." ".($user->getLastName()).",<br/>
                Vous venez de vous inscrire sur <a href=\"http://afmck.fr\">http://afmck.fr</a>.<br/>
                Afin de pouvoir vous connecter sur le site, votre compte devra être validée manuellement par un membre du CA,
                une fois votre paiement récéptionné. <br/><br/>

                Cependant, avant toutre chose, vous devez valider votre adresse email, pour cela, veuillez cliquer sur le lien suivant : <br/>
                <a href=\"http://afmck.fr/validation.php?account=".$user->getAdeliNumber()."&validation=".$user->getHashMail()."\">
                    http://afmck.fr/validation.php?account=".$user->getAdeliNumber()."&validation=".$user->getHashMail()."
                    </a><br/><br/>
                    Si vous ne vous êtes pas inscrit sur le site, veuillez ignorer ce message. En cas de problèmes, vous pouvez envoyer un email à maintenance@afmck.fr.<br/><br/>

                    En vous souhaitant une bonne journée,<br/>
                    Le bureau de l'AFMcK";
    }
    public static function getForgetPassword($name, $param) {
        return utf8_decode("Bonjour $name,<br/>
                Vous avez demandé un changement de mot de passe, vous pouvez changer de mot de passe à l'adresse suivante : <br/>
                <a href=\"http://afmck.fr/setpassword.php?$param\">
                http://afmck.fr/setpassword.php?$param
                </a><br/><br/>
                Le bureau de l'AFMcK");
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
        $ret = "Bonjour,
        Vous vous êtes correctement inscris à l'AFMcK : <br/>
        Vous trouverez ci-joint votre fiche au format PDF, vous devez signer cette fiche et la retourner par courrier ou par mail à
        <a href=\"mailto:tresorerie@afmck.fr\">tresorerie@afmck.fr</a>.<br/><br/>";
        if($user->getPayment() == 1) {
            $ret .= "Vous avez choisis de payer votre cotisation, d'un montant de<b> ".$user->getValuePaid()."euros </b>par chèque : merci d'envoyer ce chèque par courrier à l'adresse ci-dessous: <br/>
                Mme Anne-Marie GASTELLU-ETCHEGORRY,<br/>
                27 avenue du10e Dragon,<br/>
                82000 MONTAUBAN";
        } else {
            $ret .= "Vous avez choisis le paiement par virement, merci d'effectuer votre virement de <b>".$user->getValuePaid()." euros </b> au compte de l'association le plus rapidement possible. <br/>
            Vous trouverez un Relevé d'Identité Bancaire de l'AFMcK <a href=\"http://afmck.fr/docs/members/RIB.pdf\">ici</a><br/><br/>
            Pour toute question vous pouvez envoyer un mail à <a href=\"mailto:tresorerie@afmck.fr\">tresorerie@afmck.fr</a>";
        }
        $ret .=
            "<h2>".($user->getFirstName()." ".$user->getLastName())."</h2>".$user->toHtml(false)."<br/><br/>
        En vous souhaitant une bonne journée,<br/>
        Le bureau de l'AFMcK";
        return utf8_decode($ret);
    }
}