<?php
require_once('../begin.php');

$db = new database\DatabaseUser();
foreach($db->getUsersValides() as $user) {
    $date = $user->getValidDate();
    $time = strtotime($user->getValidDate()->format("Y-m-d"));
    $date2 = date("d/m/Y", $time);
    $interval = new DateInterval("P3M");
    $interval->invert = 1;
    $mailer = new Mailer();
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->CharSet = 'UTF-8';

    if($date->add($interval)->format("Y-M-d") == (new DateTime())->format("Y-M-d")) {
        $mailer->Subject .= "[ERRATUM] Pensez à renouveller votre adhésion !";
        $mailer->Body = ("Chers adhérents,<br/>Vous avez reçu un mail hier matin indiquant la fin de votre adhésion le 28 novembre 2016. Il s'agit d'un dysfonctionnement informatique survenu lors de la mise à jour du site. Votre adhésion est valable jusqu'au ".$date2.".<br/>Amicalement,<br/>Le CA de l'AFMcK");

        $mailer->addAddress($user->getMail(), $user->getFirstName()." ".$user->getLastName());
        if($mailer->send()) {
		}
    }
}
