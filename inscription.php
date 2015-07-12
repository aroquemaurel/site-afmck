<?php
include('begin.php');
use utils\Link;

require_once('libs/password_compat/lib/password.php');
$title = 'Inscription';
$breadcrumb = new utils\Breadcrumb(array(new Link('home', 'index.php'), new Link('Inscription', '#')));
$editing = false;

if(isset($_POST['firstName'])) {
    $db = new DatabaseUser();
    if($db->adeliExists($_POST['adeliNumber'])) {
        $_SESSION['lastMessage'] = Popup::errorMessage("Le numéro ADELI ".$_POST['adeliNumber']." est déjà dans la base de données.<br/>
                    Vérifiez que vous avez bien renseigné ce numéro.<br/><br/> Si tel est le cas et que vous n'êtes pas déjà inscris,
                    veuillez contacter l'association, ou l'administrateur du site à maintenance@afmck.fr");
        include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
        include(Visitor::getInstance()->getRootPath().'/views/inscription.php');
    } else if($_POST['password'] != $_POST['passwordConfirmation']) {
        $_SESSION['lastMessage'] = Popup::verificationPasswordError();
        include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
        include(Visitor::getInstance()->getRootPath().'/views/inscription.php');
    } else {
        $user = new User($_POST['adeliNumber'], password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" =>utils\Utils::getOptimalCost(0.3))));
        $user->setMail($_POST['email']);
        $user->setFirstName($_POST['firstName']);
        $user->setLastName($_POST['lastName']);
        $user->setAddress($_POST['address']);
        $user->setComplementAddress($_POST['complementAddress']);
        $user->setCp($_POST['cp']);
        $user->setTown($_POST['town']);
        $user->setHasSigned($_POST['signed'] ? 2 : -1);
        $buff = count(explode('/', $_POST['formationDate']));
        if($buff == 2) {
            $user->setFormationDate(new DateTime("01/" . $_POST['formationDate']));
        } else if($buff == 3) {
            $user->setFormationDate(new DateTime($_POST['formationDate']));
        } else {
            $_SESSION['lastMessage'] = Popup::errorMessage("La date de validation de la formation MDT n'est pas valide. Elle doit être au format mm/yyyy");
            include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
            include(Visitor::getInstance()->getRootPath().'/views/inscription.php');
            include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
            exit();
        }
        $user->setLevelFormation($_POST['levelFormation']);
        $user->setPayment($_POST['payment']);
        $user->setPhoneMobile($_POST['phoneMobile']);
        $user->setPhonePro($_POST['phonePro']);
        $user->setNewsletter(!isset($_POST['newsletter']));
        $user->setDisable(false);
        $user->setMailValidation(0);
        $user->setHashMail(password_hash($_POST['email'], PASSWORD_BCRYPT, array("cost" =>utils\Utils::getOptimalCost(0.3))));
        $user->setValuePaid($_POST['valuePaid']);
        $user->insert();

        $mailer = new Mailer();
        $mailer->isHTML(true);                                  // Set email format to HTML
        $mailer->Subject .= "Demande de validation de votre adresse email";
        $mailer->Body = utf8_decode(Mail::getValidationMail($user));
        $mailer->addAddress($user->getMail(), ($user->getFirstName())." ".($user->getLastName()));
        $mailer->send();

        $_SESSION['lastMessage'] = Popup::inscriptionOk();
        header('Location: ' . 'index.php');
    }
} else {
    include(Visitor::getInstance()->getRootPath().'/views/includes/head.php');
    include(Visitor::getInstance()->getRootPath().'/views/inscription.php');
}
include(Visitor::getInstance()->getRootPath().'/views/includes/foot.php');
?>
