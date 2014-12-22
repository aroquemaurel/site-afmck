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

    }

    public static function errorMessage($string) {
        return '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Erreur</strong> '.$string.'
        </div>';
    }
    public static function connectionOk() {
        return self::successMessage("Vous êtes maintenant connectés");
    }

    public static function connectionKo() {
        return self::errorMessage("Le numéro ADELI ou le mot de passe est incorrect");
    }
    public static function deconnectionOk() {
        return self::successMessage("Vous êtes maintenant déconnectés");
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
        return self::successMessage("Vous êtes maintenant inscrit sur le site. <br/>Afin de pouvoir vous connecter, vous devez attendre qu'un
        membre du CA valide votre inscription.");
    }
} 