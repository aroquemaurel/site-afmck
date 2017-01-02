<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 03/12/14
 * Time: 23:38
 */

class Popup {
    public static function successMessage($string) {
        return '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Succès</strong> '.$string.'
        </div>';
    }

    public static function warningMessage($string) {
        return '<div class="alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Attention</strong> '.$string.'
        </div>';

    }

    public static function errorMessage($string) {
        return '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Erreur</strong> '.$string.'
        </div>';
    }
    public static function connectionOk() {
        return self::successMessage("Vous êtes maintenant connecté");
    }

    public static function connectionKo() {
        return self::errorMessage("Le numéro ADELI ou le mot de passe est incorrect");
    }
    public static function deconnectionOk() {
        return self::successMessage("Vous êtes maintenant déconnecté");
    }

    public static function alreadyConnection() {
        return self::errorMessage("Vous êtes déjà connecté");
    }

    public static function notConnected() {
        return self::errorMessage("Vous n'êtes pas connecté");
    }

    public static function forbidden() {
        return self::errorMessage("Vous n'avez pas le droit d'accéder à cette page");
    }

    public static function verificationPasswordError()
    {
        return self::errorMessage("Le mot de passe et la confirmation sont différents");
    }

    public static function inscriptionOk()
    {
        return self::successMessage("Vous êtes maintenant inscrit sur le site.
        <br/>Afin de terminer votre inscription, vous devez valider votre adresse e-mail à l'aide du courriel que vous avez reçu.<br/><br/>
        Si vous n'avez pas reçu d'e-mail, merci de contacter la maintenance à maintenance@afmck.fr.
        ");
    }
    public static function validationOk(models\User $user)
    {
        $msg =
        "Vous êtes maintenant inscrit sur le site.
           <br/>Afin de pouvoir vous connecter, votre compte doit être validé par un membre du CA.<br/><br/>
           Pour cela, vous devez payer votre cotisation, avec le moyen de paiement convenu.<br/>
           De plus, vous devez envoyer ce <a href=\"".Visitor::getRootPage()."/docs/members/registration/".date('Y').'_'.$user->getAdeliNumber().".pdf\">document</a> signé par mail ou par courrier.
           ";
        return self::successMessage($msg);
    }
    public static function disableAccount()
    {
        return self::errorMessage("Votre compte est désactivé, vous devez renouveler votre adhésion à l'association.<br/>
Vous pouvez réadhérer à l'association via le lien suivant : <a href=\"".Visitor::getRootPage()."/readherer.php\">Réadhérer à l'association</a>");
    }

    public static function validAccount() {
        return self::successMessage("Le compte à été correctement validé.");
    }

    public static function unvalidAccount() {
        return self::successMessage("Le compte a été non validé. Il n'apparaitra plus dans la listes des comptes à valider.");
    }

    public static function warningActivation($dateString)
    {
        return self::warningMessage("Votre compte arrive à expiration le $dateString. Pensez à renouveller votre adhésion.<br/>
Vous pouvez réadhérer à l'association via le lien suivant : <a href=\"".Visitor::getRootPage()."/readherer.php\">Réadhérer à l'association</a>");
    }
} 
