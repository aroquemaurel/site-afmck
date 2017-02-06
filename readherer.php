<?php
$title = 'Réadhésion';

include('begin.php');
use models\PaymentType;
use utils\Link;

$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Réadhésion', '#')));

$loginOk = false;


if(isset($_POST['valuePaid']) && isset($_POST['payment'])) { // We ask an new adhesion
    // Fill in database
    $user = Visitor::getInstance()->getUser();
    if($user == null) {
        $user = $_SESSION['userNotConnected'];
    }
    $user->setPayment(new PaymentType(intval($_POST['payment'])));
    $user->setValuePaid($_POST['valuePaid']);
    $user->setAskReadhesion(new DateTime());
    $user->commit();

    // Regenerate PDF
    $reg = new RegistrationPdf($user, true);
    $reg->generatePdf();
    $reg = new RegistrationPdf($user);
    $reg->generatePdf();

    // Send email to tresorerie@afmck.fr
    $mailer = new Mailer();
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->Subject .= "Nouvelle demande de réadhesion sur afmck.fr";
    $mailer->Body = (Mail::getNewReadhesionTresor($user));
    $mailer->addAddress(TRESORERIE_MAIL, utf8_decode("Trésorerie"));
    $mailer->addAttachment(Visitor::getRootPath()."/docs/members/registration/tresor/".date('Y')."_".$user->getAdeliNumber().".pdf");
    $mailer->send();

    // Send email to user.
    $mailer = new Mailer();
    $mailer->isHTML(true);                                  // Set email format to HTML
    $mailer->Subject .= utf8_decode("Votre réadhésion sur afmck.fr");
    $mailer->Body = utf8_decode(Mail::getNewReadhesion($user));
    $mailer->addAddress($user->getMail(), utf8_decode($user->getFirstName()." ".$user->getLastName()));
    $mailer->addAttachment(Visitor::getRootPath()."/docs/members/registration/".date('Y')."_".$user->getAdeliNumber().".pdf");
    $mailer->send();

    $_SESSION['lastMessage'] = Popup::successMessage("Votre demande de réadhésion a bien été prise en compte. Afin que celle-ci soit validée, vous devez transmettre votre fiche signée à la trésorerie, ainsi qu'effectuer le paiement.");
    header('Location: ' . 'index.php');
}

include(Visitor::getRootPath().'/views/includes/head.php');

if(isset($_POST['inputAdeli']) && isset($_POST['inputPassword'])) {
    $loginOk = Visitor::getInstance()->getUserByAdeliAndPassword($_POST['inputAdeli'], $_POST['inputPassword']);
    $_SESSION['userNotConnected'] = Visitor::getInstance()->getUser();
    if(!$loginOk) {
        $_SESSION['lastMessage'] = Popup::errorMessage("Le numéro ADELI et le mot de passe ne correspondent pas.");
    }
}
if((Visitor::getInstance()->isConnected()) || $loginOk) { // we are connected…
    include(Visitor::getRootPath().'/views/readhesion/demande-adhesion.php');
} else { // I'm a visitor
    // display login/password
    $readhesion = true;
    include(Visitor::getRootPath().'/views/readhesion/verifier-login.php');
}

include(Visitor::getRootPath().'/views/includes/foot.php');
?>
