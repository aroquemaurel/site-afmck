<?php
include('begin.php');

use database\DatabaseUser;
use models\User; 
require_once('libs/password_compat/lib/password.php');
$err = false;
if(isset($_GET['validation']) && isset($_GET['account'])) {
    $db = new DatabaseUser();
    $data = $db->getUser($_GET['account']);

    if($data != null) {
        $user = new User();
        $user->hydrat($data);

        if ($user->getHashMail() == $_GET['validation']) {
            $user->setMailValidation(1);
            $user->commit();
            $_SESSION['lastMessage'] = Popup::validationOk($user);

            // Send email to tresorerie@afmck.fr
            $reg = new RegistrationPdf($user, true);
            $reg->generatePdf();
            $reg = new RegistrationPdf($user);
            $reg->generatePdf();

            $mailer = new Mailer();
            $mailer->isHTML(true);                                  // Set email format to HTML
            $mailer->Subject .= "Nouvelle inscription sur afmck.fr";
            $mailer->Body = (Mail::getNewAccountTresor($user));
            $mailer->addAddress(TRESORERIE_MAIL, utf8_decode("Trésorerie"));
            $mailer->addAttachment(Visitor::getRootPath()."/docs/members/registration/tresor/".date('Y').'_'.$user->getAdeliNumber().".pdf");
            $mailer->send();

            // Send email to user.
            $mailer = new Mailer();
            $mailer->isHTML(true);                                  // Set email format to HTML
            $mailer->Subject .= "Votre inscription sur afmck.fr";
            $mailer->Body = (Mail::getNewAccount($user));
            $mailer->addAddress($user->getMail(), utf8_decode($user->getFirstName()." ".$user->getLastName()));
            $mailer->addAttachment(Visitor::getRootPath()."/docs/members/registration/".date('Y').'_'.$user->getAdeliNumber().".pdf");
            $mailer->send();
        } else {
            $err = true;
        }
    } else {

        $err = true;
    }

} else {
    $err = true;
}

if($err) {
    $_SESSION['lastMessage'] = Popup::errorMessage("Vous n'avez pas le droit d'être sur cette page");
}
header('Location: ' . 'index.php');
