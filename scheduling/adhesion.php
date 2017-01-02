<?php
require_once('../begin.php');

$db = new database\DatabaseUser();
foreach($db->getUsersValides() as $user) {
    $date = $user->getValidDate();
    $interval = new DateInterval("P3M");
    $interval->invert = 1;
    $mailer = new Mailer();
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->CharSet = 'UTF-8';

    if($date->add($interval)->format("Y-M-d") == (new DateTime())->format("Y-M-d")) {
        $mailer->Subject .= "Pensez à renouveller votre adhésion !";
        $mailer->Body = ("Bonjour,<br/>Votre adhésion à l'AFMcK prendra fin le ".$date->format("d-M-Y").", pensez à renouveller votre adhésion".
        "<br/>Pour cela, vous pouvez vous rendre sur la page <a href=\"http://afmck.fr/readherer.php\">http://afmck.fr/readherer.php</a>.<br/><br/>
        Le CA de l'AFMcK");

        $mailer->addAddress($user->getMail(), $user->getFirstName()." ".$user->getLastName());
        if($mailer->send()) {
		}
    }
}
foreach($db->getUsersHS() as $user) {
    $date = new DateTime();
    if($user->getValidDate()->format("Y-M-d") == (new DateTime())->format("Y-M-d")) {
        $mailer->Subject .= "Pensez à renouveller votre adhésion, votre compte est désactivé !";
        $mailer->Body = ("Bonjour,<br/>Votre adhésion à l'AFMcK à pris fin ce jour, pensez à renouveller votre adhésion".
            "<br/>Tant que votre adhésion n'aura pas été renouvellée, vous ne pourrez plus accéder au site web ou au logiciel.<br/>".
        "Pour cela, vous pouvez vous rendre sur la page <a href=\"http://afmck.fr/readherer.php\">http://afmck.fr/readherer.php</a>.<br/><br/>
        Le CA de l'AFMcK");

        $mailer->addAddress($user->getMail(), $user->getFirstName()." ".$user->getLastName());
        if($mailer->send()) {
		}
    }

    if(!$user->isActive() && $user->getValidDate()->add(new DateInterval(("P1M")))->format("Y-M-d") == (new DateTime())->format("Y-M-d")) {
        $mailer->Body = ("Bonjour,<br/>Votre adhésion à l'AFMcK à pris fin le ".$date->format("d-M-Y").", pensez à renouveller votre adhésion".
            "<br/>Tant que votre adhésion n'aura pas été renouvellée, vous ne pourrez plus accéder au site web ou au logiciel.<br/>".
            "Pour cela, vous pouvez vous rendre sur la page <a href=\"http://afmck.fr/readherer.php\">http://afmck.fr/readherer.php</a>.<br/><br/>
        Le CA de l'AFMcK");

        $mailer->addAddress($user->getMail(), $user->getFirstName()." ".$user->getLastName());
        if($mailer->send()) {
		}
    }
}
