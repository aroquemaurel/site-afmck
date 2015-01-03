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

    public static function getForgetPassword($name, $param) {
        return "Bonjour $name,<br/>
                Vous avez demandé un changement de mot de passe, vous pouvez changer de mot de passe à l'adresse suivante : <br/>
                <a href=\"http://afmck.fr/setpassword.php?$param\">
                http://afmck.fr/setpassword.php?$param
                </a><br/><br/>
                Le bureau de l'AFMcK";
    }
}