<?php
include('begin.php');
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
            $_SESSION['lastMessage'] = Popup::validationOk();
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