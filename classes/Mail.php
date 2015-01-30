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
    public static function getValidationMail(User $user) {
        return "Bonjour ".utf8_decode($user->getFirstName())." ".utf8_decode($user->getLastName()).",<br/>
                Vous venez de vous inscrire sur <a href=\"http://afmck.fr\">http://afmck.fr</a>.<br/>
                Afin de pouvoir vous connecter sur le site, votre compte devra être validée manuellement par un membre du CA,
                une fois votre paiement récéptionné. <br/><br/>

                Cependant, avant toutre chose, vous devez valider votre adresse email, pour cela, veuillez cliquer sur le lien suivant : <br/>
                <a href=\"http://afmck.fr/validation.php?account=".$user->getAdeliNumber()."&validation=".$user->getHashMail()."\">
                    http://afmck.fr/validation.php?account=".$user->getAdeliNumber()."&validation=".$user->getHashMail()."
                    </a><br/><br/>
                    Si vous ne vous êtes pas inscrit sur le site, veuillez ignorer ce message. En cas de problèmes, vous pouvez envoyer un email à maintenance@afmck.fr.<br/><br/>

                    En vous souhaitant une bonne journée,<br/>
                    Le site afmck.fr";
    }
    public static function getForgetPassword($name, $param) {
        return "Bonjour $name,<br/>
                Vous avez demandé un changement de mot de passe, vous pouvez changer de mot de passe à l'adresse suivante : <br/>
                <a href=\"http://afmck.fr/setpassword.php?$param\">
                http://afmck.fr/setpassword.php?$param
                </a><br/><br/>
                Le bureau de l'AFMcK";
    }
}