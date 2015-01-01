<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 01/01/15
 * Time: 12:25
 */

class Mail {
    public static function getValidationRegistrationMail($name, $date) {
        return "Bonjour $name,<br/>
                Votre compte sur <a href=\"http://afmck.fr\">http://afmck.fr</a>
                a été validé et sera accessible jusqu'au $date !<br/>
                Bonne visite sur le site.<br/><br/>

                Le bureau de l'AFMcK";
    }
}