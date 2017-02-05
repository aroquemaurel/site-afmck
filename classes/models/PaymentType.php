<?php
/**
 * Created by PhpStorm.
 * User: aroquemaurel
 * Date: 06/11/16
 * Time: 18:43
 */

namespace models;


class PaymentType
{
    private $idType;

    public function __construct(int $idType) {
        $this->idType = $idType;
    }

    public function toString() {
        switch ($this->idType) {
            case 1:
                return "Chèque";
            case 2:
                return "Virement";
            case 3:
                return "Carte bancaire via helloasso";
            default:
                return "Paiement inconnu";
        }
    }

    public function getIdType() {
        return $this->idType;
    }

    public function getExplainMessage(User $user) {
        switch($this->idType) {
            case 1:
                return "Vous avez choisi de payer votre cotisation, d'un montant de<b> ".$user->getValuePaid()."euros </b>par chèque : merci d'envoyer ce chèque par courrier à l'adresse ci-dessous: <br/>
                Mme Adeline Braguier,<br/>
                32, cours Albert Thomas<br/>
                69008 LYON";
            case 2:
                return "Vous avez choisi le paiement par virement, merci d'effectuer votre virement de <b>".$user->getValuePaid()." euros </b> au compte de l'association le plus rapidement possible. <br/>".
                "Vous trouverez un Relevé d'Identité Bancaire de l'AFMcK <a href=\"http://afmck.fr/docs/members/RIB.pdf\">ici</a><br/><br/>".
                "Pour toute question vous pouvez envoyer un mail à <a href=\"mailto:tresorerie@afmck.fr\">tresorerie@afmck.fr</a>";
            case 3:
                return "Vous avez choisi le paiement par carte bancaire en passant par <a href=\"https://www.helloasso.com/associations/afmck\">helloasso</a>, site qui va vous permettre d'effectuer une transaction sécurisée. ".
                "Pour effectuer votre paiement, vous devez aller sur la page <a href=\"https://www.helloasso.com/associations/afmck\">https://www.helloasso.com/associations/afmck</a> et cliquer sur « faire un don ». ".
                "Effectuer le don de votre cotisation, et renseigner vos coordonnées.<br/><br/>Pour toute question ou incompréhension vous pouvez envoyer un mail à <a href=\"mailto:tresorerie@afmck.fr\">tresorerie@afmck.fr</a>";
        }
    }
}
