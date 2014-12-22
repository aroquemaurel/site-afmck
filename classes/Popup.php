<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 03/12/14
 * Time: 23:38
 */

class Popup {
    public static function connectionOk() {
        return '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Succès</strong> Vous êtes maintenant connectés
        </div>';
    }

    public static function connectionKo() {
        return '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Erreur</strong> Le numéro ADELI ou le mot de passe est incorrect
        </div>';
    }
    public static function deconnectionOk() {
        return '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Succès</strong> Vous êtes maintenant déconnectés
        </div>';
    }

    public static function alreadyConnection() {
        return '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Erreur</strong> Vous êtes déjà connecté
        </div>';
    }

    public static function notConnected() {
        return '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Erreur</strong> Vous n\'êtes pas connecté
        </div>';
    }

    public static function forbidden() {
        return '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <strong>Erreur</strong> Vous n\'avez pas le droit d\'accéder à cette page
        </div>';
    }
} 